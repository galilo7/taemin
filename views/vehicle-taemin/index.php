<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleTaeminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('vehicletaemin', 'App Vehicle Taemins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicle-taemin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('vehicletaemin', 'Create App Vehicle Taemin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'taemin_name',
            'r_available_taemin',
            'r_customer',
            // 'madmoun_name',
            // 'contract_date',
            // 'start_date',
            // 'end_date',
            // 'sale',
            // 'sale_letters',
            // 'paid',
            // 'paid_letters',
            // 'remaining',
            // 'is_military',
            // 'r_vehicle',
            // 'coverage',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
