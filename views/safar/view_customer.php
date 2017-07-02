<?php

use app\models\appmodels\AppSafar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AppSafar */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('safar', 'App Safars'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-safar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('safar', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
//        echo Html::a(Yii::t('safar', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('safar', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]);

        echo Html::a(Yii::t('safar', 'Deactivate'), ['deactivate', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('safar', 'Are you sure you want to deactivate this item?'),
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
            'madmoun_name',
            'contract_date',
            'start_date',
            'end_date',
            'sale',
            'sale_letters',
            'paid',
            'paid_letters',
            'remaining',
            'coverage',
            'destination_country',
            'residence_country',
            'nationality',
            'sex',
            'passport_no',
            'birth',
            [
                'format' => 'raw',
                'attribute' => 'field',
                'value' => isset($model->field) ? Html::a(Yii::t('safar', 'Press Here To Get The File'), Url::to('@web/' . $model->field)) : "لا يوجد ملف",
            ],
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
