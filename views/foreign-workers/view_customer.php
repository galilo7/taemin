<?php

use app\models\appmodels\AppForeignWorkers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AppForeignWorkers */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = $this->title;
$uploadPath = 'uploads/';
?>
<div class="app-foreign-workers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('foreign_workers', 'Update'), ['update-from-customer', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
//        echo Html::a(Yii::t('foreign_workers', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('foreign_workers', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]);

        echo Html::a(Yii::t('foreign-workers', 'Deactivate'), ['deactivate', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('foreign_workers', 'Are you sure you want to deactivate this item?'),
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
            'r_available_taemin',
            'r_customer',
            'contract_date',
            'start_date',
            'end_date',
            'sale',
            'sale_letters',
            'paid',
            'paid_letters',
            'remaining',
            'coverage',
            'kafil_name',
            'madmoun_name',
            'worker_nationality',
            'worker_sex',
            'worker_birth',
            'worker_passport_no',
            'worker_job',
            [
                'format' => 'raw',
                'attribute' => 'field',
                'value' => isset($model->field) ? Html::a(Yii::t('cfw', 'Press Here To Get The File'), Url::to('@web/' . $uploadPath . $model->field)) : "لا يوجد ملف",
            ],
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
