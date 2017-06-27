<?php

namespace app\controllers;

use app\models\appmodels\AppBasicTbl;
use app\models\appmodels\AppBasicTblSearch;
use app\models\appmodels\AppCfw;
use app\models\appmodels\AppNewTaeminPolicy;
use app\models\BasicTblSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BasicTblController implements the CRUD actions for AppBasicTbl model.
 */
class BasicTblController extends Controller {

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

    public function actionCreateForCustomer($customerId) {

        $taeminNamemodel = new AppNewTaeminPolicy();

        if ($taeminNamemodel->load(Yii::$app->request->post()) && $taeminNamemodel->validate()) {
            switch ($taeminNamemodel->selectedTaeminName) {
                case "حريق":
                    $url = Url::to('cfw/create-for-customer');
                    break;

                case "مسؤولية مدنية":
                    $url = Url::to('cfw/create-for-customer');
                    break;

                case "طوارئ عمل":
                    $url = Url::to('cfw/create-for-customer');
                    break;

                case "عمال أجانب":
                    $url = Url::to('foreign-workers/create-for-customer');
                    break;

                case "مدارس":
                    $url = Url::to('schools/create-for-customer');
                    break;

                case "استشفاء":
                    $url = Url::to('hospitals/create-for-customer');
                    break;

                case "سفر":
                    $url = Url::to('safar/create-for-customer');
                    break;

                case "إلزامي":
                    $url = Url::to('vehicle-taemin/create-for-customer');
                    break;

                case "مادي":
                    $url = Url::to('vehicle-taemin/create-for-customer');
                    break;

                case "نقل أموال":
                    $url = Url::to('money-transfer/create-for-customer');
                    break;

//                case "مدارس":
//                    $url = Url::to('cfw/create-for-customer');
//                    break;
            }
//            die(\yii\helpers\VarDumper::dump($model, 4, true));
            return $this->redirect([$url, 'customerId' => $customerId, 'selectedTaeminName' => $taeminNamemodel->selectedTaeminName]);

//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            die("notValidates");
            $this->redirect(Yii::$app->request->referrer);
        }
    }

    // this method brings all the produced insurance policies
    public function actionAll() {

        $this->view->title = Yii::t('basictbl', 'App Basic Tbl');

        $searchModel = new AppBasicTblSearch();
        $dataProvider = $searchModel->searchForCustomer(Yii::$app->request->queryParams, null); // brings from all search models

        return $this->render('index_all', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all AppBasicTbl models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new BasicTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppBasicTbl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppBasicTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AppBasicTbl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppBasicTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view_customer', 'id' => $model->id]);
        } else {
            return $this->render('update_customer', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AppBasicTbl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppBasicTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppBasicTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AppBasicTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
