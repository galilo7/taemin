<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppForeignWorkers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-foreign-workers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_available_taemin')->textInput() ?>

    <?= $form->field($model, 'r_customer')->textInput() ?>

    <?= $form->field($model, 'contract_date')->textInput() ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'coverage')->textInput() ?>

    <?= $form->field($model, 'kafil_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'madmoun_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker_nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker_birth')->textInput() ?>

    <?= $form->field($model, 'worker_passport_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'worker_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('foreignworkers', 'Create') : Yii::t('foreignworkers', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
