<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCfw */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-cfw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taemin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_available_taemin')->textInput() ?>

    <?= $form->field($model, 'r_customer')->textInput() ?>

    <?= $form->field($model, 'madmoun_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_date')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'coverage')->textInput() ?>

    <?= $form->field($model, 'property_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_workers')->textInput() ?>

    <?= $form->field($model, 'building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('cfw', 'Create') : Yii::t('cfw', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
