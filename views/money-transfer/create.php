<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppMoneyTransfer */

$this->title = Yii::t('moneytransfer', 'Create App Money Transfer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('moneytransfer', 'App Money Transfers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-money-transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
