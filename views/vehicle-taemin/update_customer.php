<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppVehicleTaemin */

$this->title = Yii::t('vehicletaemin', 'Update {modelClass}: ', [
            'modelClass' => 'App Vehicle Taemin',
        ]) . $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicletaemin', 'App Vehicle Taemins'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];

$this->params['breadcrumbs'][] = Yii::t('vehicletaemin', 'Update');
?>
<div class="app-vehicle-taemin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
