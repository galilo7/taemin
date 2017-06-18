<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppMoneyTransfer */

$this->title = Yii::t('moneytransfer', 'Update {modelClass}: ', [
    'modelClass' => 'App Money Transfer',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('moneytransfer', 'App Money Transfers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('moneytransfer', 'Update');
?>
<div class="app-money-transfer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
