<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppAvailableTaemin */

$this->title = Yii::t('available_taemin', 'Update: ') . $model->name . " - " . $model->companyName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('available_taemin', 'App Available Taemins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('available_taemin', 'Update');
?>
<div class="app-available-taemin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
