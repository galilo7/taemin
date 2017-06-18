<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppVehicles */

$this->title = Yii::t('vehicles', 'Update {modelClass}: ', [
    'modelClass' => 'App Vehicles',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicles', 'App Vehicles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('vehicles', 'Update');
?>
<div class="app-vehicles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
