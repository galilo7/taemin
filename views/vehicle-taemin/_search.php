<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleTaeminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-vehicle-taemin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'taemin_name') ?>

    <?= $form->field($model, 'r_available_taemin') ?>

    <?= $form->field($model, 'r_customer') ?>

    <?php // echo $form->field($model, 'madmoun_name') ?>

    <?php // echo $form->field($model, 'contract_date') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'sale_letters') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'paid_letters') ?>

    <?php // echo $form->field($model, 'remaining') ?>

    <?php // echo $form->field($model, 'is_military') ?>

    <?php // echo $form->field($model, 'r_vehicle') ?>

    <?php // echo $form->field($model, 'coverage') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('vehicletaemin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('vehicletaemin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
