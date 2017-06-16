<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSafar */

$this->title = Yii::t('safar', 'Update {modelClass}: ', [
    'modelClass' => 'App Safar',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('safar', 'App Safars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('safar', 'Update');
?>
<div class="app-safar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
