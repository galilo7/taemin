<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\appmodels\AppLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (isset($customer)) {
    $this->title = Yii::t('logs', 'App Logs') . ": " . $customer->first_name . " " . $customer->fathers_name . " " . $customer->last_name . " - " . $customer->phone1;
} else {
//    $this->title = $model->id;
    $this->title = Yii::t('logs', 'App Logs');
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-logs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php
        echo isset($customer) ? Html::a(Yii::t('logs', 'Create App Logs'), ['logs/create-for-customer', 'customerId' => $customer->id], ['class' => 'btn btn-success']) : Html::a(Yii::t('logs', 'Create App Logs'), ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'c_code',
//            'r_customerId',
//            [
//                'label' => 'Full Name',
//                'attribute' => 'r_customerId',
//                'value' => function($model) {
//                    return $model->customers->c_fName . " " . $model->customers->c_lName . "\r\n" . $model->customers->c_phone1;
//                },
//            ],
//            'fullName',
            'first_name',
            'father_name',
            'last_ame',
            'phone1',
            'insured',
//            'r_taeminType',
            'taeminTypeName',
//            [
//                'attribute' => 'r_taeminType',
//                'value' => 'taeminTypes.c_type',
//            ],
//            'c_amount',
            // 'c_price',
            // 'c_cost',
//            'c_sale',
            'totalSale',
            'paid',
            'remaining',
            // 'c_kafilName',
            // 'c_sex',
            // 'c_nationality',
            // 'c_birthDate',
            // 'c_passportNo',
            // 'c_homeNo',
            // 'c_coverage',
            // 'c_wakil',
            // 'c_noOfWorkers',
            // 'c_isWithDaman',
            // 'c_inOut',
            // 'c_address',
            // 'c_phone1',
            // 'c_phone2',
            // 'c_destination',
            // 'c_countryOfResidence',
            // 'c_passNo',
            // 'c_carType',
            // 'c_carModel',
            // 'c_registrationNo',
            // 'c_horses',
            // 'c_passengers',
            // 'c_engineNo',
            // 'c_chessiNo',
            // 'c_7ammalaNo',
            // 'c_isMilitary',
            // 'c_weight',
            // 'c_agirMadmounName',
            // 'c_vehiclePrice',
            'c_startDate',
            'c_endDate',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
