<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppMoneyTransfer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-money-transfer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'no_persons')->textInput() ?>

    <?= $form->field($model, 'no_banks')->textInput() ?>

    <?= $form->field($model, 'max_money')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('moneytransfer', 'Create') : Yii::t('moneytransfer', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
