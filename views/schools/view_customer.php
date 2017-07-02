<?php

use app\models\appmodels\AppSchools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AppSchools */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('schools', 'App Schools'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = $this->title;
$uploadPath = 'uploads/';
?>
<div class="app-schools-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('schools', 'Update'), ['update-from-customer', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
//        echo Html::a(Yii::t('schools', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('schools', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]);

        echo Html::a(Yii::t('schools', 'Deactivate'), ['deactivate', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('schools', 'Are you sure you want to deactivate this item?'),
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
            'school_name',
            'school_address',
            'school_type',
            'manager',
            'number_of_students',
            'student_price',
            'is_morning',
            'is_afternoon',
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
