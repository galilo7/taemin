<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCustomers */

$this->title = Yii::t('customers', 'Update {modelClass}: ', [
    'modelClass' => 'App Customers',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('customers', 'App Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('customers', 'Update');
?>
<div class="app-customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
