<?php

namespace app\controllers;

use app\models\appmodels\AppForeignWorkers;
use app\models\ForeignWorkersSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ForeignWorkersController implements the CRUD actions for AppForeignWorkers model.
 */
class ForeignWorkersController extends Controller {

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
        $model = new AppForeignWorkers();
        $model->r_customer = $customerId;
        $model->customerName = $customerName;
        $model->taemin_name = $selectedTaeminName;

        $uploadPath = 'uploads/';

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if (isset($model->file)) {
                $model->file->saveAs($uploadPath . time() . '.' . $model->file->extension);
                $model->field = time() . '.' . $model->file->extension;
            } else {
                $model->field = NULL;
            }
            if ($model->save()) {
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

    public function actionUpdateFromCustomer($id) {
        $uploadPath = 'uploads/';

        $model = $this->findModel($id);

        $oldField = $model->field;
        $oldFile = $uploadPath . $oldField;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if (isset($model->file)) { //if there is a new file, must remove the old one if exists
                if (isset($oldField) and file_exists($oldFile)) {
                    unlink($oldFile);
                }
                $model->file->saveAs($uploadPath . time() . '.' . $model->file->extension);
                $model->field = time() . '.' . $model->file->extension;
            } else { //case no new file keep old file -- NOTICE: IT IS REMOVED BY AN AJAX CALL WHEN THE USER CLICKS ON DELETE
                $model->field = $oldField;
            }

            if ($model->save()) {
                return $this->redirect(['view-from-customer', 'id' => $model->id]);
            }
        } else {

            return $this->render('update_customer', [
                        'model' => $model,
            ]);
        }
    }

//    public function actionUpdateFromCustomer($id) {
//        $uploadPath = 'uploads/';
//
//        $model = $this->findModel($id);
//        $oldField = $model->field;
//
//        if ($model->load(Yii::$app->request->post())) {
//            $model->file = UploadedFile::getInstance($model, 'file');
//            if (isset($model->file)) {
//                if (isset($oldFile) and file_exists($oldFile)) {
//                    $oldFile = $uploadPath . $oldField;
//
//                    unlink($oldFile);
//                }
//                $model->file->saveAs($uploadPath . time() . '.' . $model->file->extension);
//                $model->field = time() . '.' . $model->file->extension;
//            } else { //case no new file
//                $model->field = $oldField;
//            }
//
//            if ($model->save()) {
////                $image->saveAs($path);
//                return $this->redirect(['view-from-customer', 'id' => $model->id]);
//            }
//            //        if ($model->load(Yii::$app->request->post())) {
////         die(smna   
////        }
////        if ($model->load(Yii::$app->request->post()) && $model->save()) {
////            return $this->redirect(['view_customer', 'id' => $model->id]);
//        } else {
//
//            return $this->render('update_customer', [
//                        'model' => $model,
//            ]);
//        }
//    }

    public function actionDeleteFile() {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $id = explode(":", $data['id']);
            $id = $id[0];
            $model = $this->findModel($id);
//            die(\yii\helpers\VarDumper::dump($model, 4, true));
            $result = $model->deleteFile();
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'result' => $result,
            ];
        }
    }

    public function actionDelete($id) {

        $model = $this->findModel($id);
        $result = $model->deleteFile();

        $model->delete();

        return $this->redirect(['basic-tbl/index']);
    }

    public function actionViewFromCustomer($id) {
        return $this->render('view_customer', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionDeleteFromCustomer($id) {
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Lists all AppForeignWorkers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ForeignWorkersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppForeignWorkers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppForeignWorkers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AppForeignWorkers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppForeignWorkers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Finds the AppForeignWorkers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppForeignWorkers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AppForeignWorkers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
