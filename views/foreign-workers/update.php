<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppForeignWorkers */

$this->title = Yii::t('foreignworkers', 'Update {modelClass}: ', [
    'modelClass' => 'App Foreign Workers',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('foreignworkers', 'Update');
?>
<div class="app-foreign-workers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
