<?php

use app\models\appmodels\AppVehicleTaemin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AppVehicleTaemin */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicletaemin', 'App Vehicle Taemins'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicle-taemin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('vehicle_taemin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
//        echo Html::a(Yii::t('vehicle_taemin', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('vehicle_taemin', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]);

        echo Html::a(Yii::t('vehicle_taemin', 'Deactivate'), ['deactivate', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('vehicle_taemin', 'Are you sure you want to deactivate this item?'),
                'method' => 'post',
            ],
        ]);
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'code',
            'taemin_name',
            'r_available_taemin',
            'r_customer',
            'madmoun_name',
            'contract_date',
            'start_date',
            'end_date',
            'sale',
            'sale_letters',
            'paid',
            'paid_letters',
            'remaining',
            'is_military',
            'r_vehicle',
            'coverage',
            [
                'format' => 'raw',
                'attribute' => 'field',
                'value' => isset($model->field) ? Html::a(Yii::t('vehicle_taemin', 'Press Here To Get The File'), Url::to('@web/' . $model->field)) : "لا يوجد ملف",
            ],
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
