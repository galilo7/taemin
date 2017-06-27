<?php

namespace app\controllers;

use app\models\appmodels\AppBasicTblSearch;
use app\models\appmodels\AppCustomers;
use app\models\appmodels\AppNewTaeminPolicy;
use app\models\CustomersSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CustomersController implements the CRUD actions for AppCustomers model.
 */
class CustomersController extends Controller {

    public function actionGetForCustomer($id) {
        $customer = AppCustomers::find()->where(['id' => $id])->one();
        $customerDescription = $customer->first_name . " " . $customer->fathers_name . " " . $customer->last_name . " - " . $customer->phone1;
        $this->view->title = Yii::t('basictbl', 'App Basic Tbls') . " -- " . $customerDescription;

        $searchModel = new AppBasicTblSearch();
        $dataProvider = $searchModel->searchForCustomer(Yii::$app->request->queryParams, $id); // brings from all search models

        $taeminNamemodel = new AppNewTaeminPolicy();



        return $this->render('@app/views/basic-tbl/index_customer', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'customer' => $customer,
                    'taeminNamemodel' => $taeminNamemodel,
        ]);
    }

//    public function actionGetForCustomerX($id) {
//        $customer = AppCustomers::find()->where(['id' => $id])->one();
//        $customerDescription = $customer->first_name . " " . $customer->fathers_name . " " . $customer->last_name . " - " . $customer->phone1;
//
//        $query1 = (new Query())
//                ->select([new Expression("CONCAT('cfw+' , 'id') as superId"), 'code', 'r_available_taemin', 'end_date', 'remaining'])
//                ->from('cfw')
//                ->where(['r_customer' => $id]);
//
//        $query2 = (new Query())
//                ->select([new Expression("CONCAT('foreign_workers+' , 'id') as superId"), 'code', 'r_available_taemin', 'end_date', 'remaining'])
//                ->from('foreign_workers')
//                ->where(['r_customer' => $id]);
////        die(VarDumper::dump($query1, 4, TRUE));
//
//        $dataProvider1 = new ActiveDataProvider([
//            'query' => $query1,
//        ]);
//
//        $dataProvider2 = new ActiveDataProvider([
//            'query' => $query2,
//        ]);
//
//
//
//
//        return $this->render('@app/views/basic-tbl/index', [
////                    'searchModel' => $searchModel,
//                    'dataProvider1' => $dataProvider1,
//                    'dataProvider2' => $dataProvider2,
//                    'customer' => $customer,
//        ]);
//    }
//
//    public function actionGetForCustomerWIthDATAPROVIDER111TABLE($id) {
//        $customer = AppCustomers::find()->where(['id' => $id])->one();
//        $customerDescription = $customer->c_fName . " " . $customer->c_fatherName . " " . $customer->c_lName . " - " . $customer->c_phone1;
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => AppLogs::find()->where(['r_customerId' => $id]),
//        ]);
//        $searchModel = new AppLogsSearch();
//        $dataProvider = $searchModel->searchId(Yii::$app->request->queryParams, $id);
//
//        return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                    'customer' => $customer,
//        ]);
//    }

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

    /**
     * Lists all AppCustomers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppCustomers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AppCustomers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AppCustomers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AppCustomers model.
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
     * Deletes an existing AppCustomers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AppCustomers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppCustomers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AppCustomers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
