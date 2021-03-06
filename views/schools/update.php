<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSchools */

$this->title = Yii::t('schools', 'Update {modelClass}: ', [
    'modelClass' => 'App Schools',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('schools', 'App Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('schools', 'Update');
?>
<div class="app-schools-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
