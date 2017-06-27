<?php

use app\models\appmodels\AppCfw;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model AppCfw */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('cfw', 'App Cfws'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-cfw-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('cfw', 'Update'), ['update-from-customer', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('cfw', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('cfw', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
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
            'coverage',
            'property_no',
            'number_of_workers',
            'building',
            'field',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
