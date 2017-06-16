<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppHospitals */

$this->title = Yii::t('hospitals', 'Update {modelClass}: ', [
    'modelClass' => 'App Hospitals',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('hospitals', 'App Hospitals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('hospitals', 'Update');
?>
<div class="app-hospitals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
