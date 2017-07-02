<?php

use app\models\appmodels\AppForeignWorkers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model AppForeignWorkers */

$this->title = Yii::t('foreignworkers', 'Update {modelClass}: ', [
            'modelClass' => 'App Foreign Workers',
        ]) . $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];
$this->params['breadcrumbs'][] = Yii::t('foreignworkers', 'Update');
?>
<div class="app-foreign-workers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
