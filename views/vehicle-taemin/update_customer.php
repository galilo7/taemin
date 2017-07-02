<?php

use app\models\appmodels\AppVehicleTaemin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model AppVehicleTaemin */

$this->title = Yii::t('vehicle_taemin', 'Update Policy');

//$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicletaemin', 'App Vehicle Taemins'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = Yii::t('vehicle_taemin', 'Update');
?>
<div class="app-vehicle-taemin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
