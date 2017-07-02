<?php

namespace app\controllers;

use app\models\appmodels\AppCfw;
use app\models\CfwSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CfwController implements the CRUD actions for AppCfw model.
 */
class CfwController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionCreateForCustomer($customerId, $customerName, $selectedTaeminName) {
//        die($customerName);
//        die(\yii\helpers\VarDumper::dump(Yii::$app->params['uploadPath'], 4, true));

        $model = new AppCfw();
        $model->r_customer = $customerId;
        $model->customerName = $customerName;
        $model->taemin_name = $selectedTaeminName;


        if ($model->load(Yii::$app->request->post())) {
//            die(\yii\helpers\VarDumper::dump($model->file, 3, true));
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/' . time() . '.' . $model->file->extension);
            $model->field = 'uploads/' . time() . '.' . $model->file->extension;

            if ($model->save()) {
//                $image->saveAs($path);

                return $this->redirect(['view-from-customer', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDeactivate($id) {
        $model = $this->findModel($id);
        $model->is_active = 0;
        return $this->redirect(['view-from-customer', 'id' => $model->id]);
    }

    public function actionViewFromCustomer($id) {
        return $this->render('view_customer', [
                    'model' => $this->findModel($id),
        ]);
    }

//    public function actionUpdateFromCustomer($id) {
//        $model = $this->findModel($id);
//    }

    public function actionUpdateFromCustomer($id) {

        $model = $this->findModel($id);
        $oldField = $model->field;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)) {
                if (isset($oldField) and file_exists($oldField)) {
                    unlink($oldField);
                }
                $model->file->saveAs('uploads/' . time() . '.' . $model->file->extension);
                $model->field = 'uploads/' . time() . '.' . $model->file->extension;
            } else { //case no new file
                $model->field = $oldField;
            }

            if ($model->save()) {
//                $image->saveAs($path);
                return $this->redirect(['view-from-customer', 'id' => $model->id]);
            }
            //        if ($model->load(Yii::$app->request->post())) {
//         die(smna   
//        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view_customer', 'id' => $model->id]);
        } else {

            return $this->render('update_customer', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDeleteFile() {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = explode(":", $data['id']);
            $id = $id[0];
            $model = $this->findModel($id);
            $result = $model->deleteFile();
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'result' => $result,
            ];
        }
    }

    /**
     * Lists all AppCfw models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CfwSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppCfw model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppCfw model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AppCfw();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppCfw model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            echo 'updateFromUpdateDefault';
            die(\yii\helpers\VarDumper::dump($model, 4, true));
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AppCfw model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {

        $model = $this->findModel($id);
        if (isset($model->field)) {
            if (fileExists($model->field)) {
                unlink(Yii::getAlias("@web/uploads/" . $model->field));
            }
        }
        $model->delete();

        return $this->redirect(['basic-tbl/index']);
    }

    /**
     * Finds the AppCfw model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppCfw the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AppCfw::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
