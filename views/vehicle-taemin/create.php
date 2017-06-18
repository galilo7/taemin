<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppVehicleTaemin */

$this->title = Yii::t('vehicletaemin', 'Create App Vehicle Taemin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicletaemin', 'App Vehicle Taemins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicle-taemin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
