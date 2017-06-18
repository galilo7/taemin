<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppVehicles */

$this->title = Yii::t('vehicles', 'Create App Vehicles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicles', 'App Vehicles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
