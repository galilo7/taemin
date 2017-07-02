<?php

use app\models\appmodels\AppVehicleTaemin;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model AppVehicleTaemin */

$this->title = Yii::t('vehicletaemin', 'Update {modelClass}: ', [
            'modelClass' => 'App Vehicle Taemin',
        ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicletaemin', 'App Vehicle Taemins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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
