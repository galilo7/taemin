<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppAvailableTaemin */

$this->title = Yii::t('available_taemin', 'Create App Available Taemin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('available_taemin', 'App Available Taemins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-available-taemin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
