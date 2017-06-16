<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiclesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-vehicles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'vehicle_usage') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'net_load') ?>

    <?php // echo $form->field($model, 'registration_number') ?>

    <?php // echo $form->field($model, 'horses') ?>

    <?php // echo $form->field($model, 'passengers') ?>

    <?php // echo $form->field($model, 'shecci_number') ?>

    <?php // echo $form->field($model, 'engine_number') ?>

    <?php // echo $form->field($model, 'preview_month') ?>

    <?php // echo $form->field($model, 'preview_cost') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('vehicles', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('vehicles', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
