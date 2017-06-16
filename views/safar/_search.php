<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SafarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-safar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'r_available_taemin') ?>

    <?= $form->field($model, 'r_customer') ?>

    <?= $form->field($model, 'madmoun_name') ?>

    <?php // echo $form->field($model, 'contract_date') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'sale_letters') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'paid_letters') ?>

    <?php // echo $form->field($model, 'remaining') ?>

    <?php // echo $form->field($model, 'coverage') ?>

    <?php // echo $form->field($model, 'destination_country') ?>

    <?php // echo $form->field($model, 'residence_country') ?>

    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'passport_no') ?>

    <?php // echo $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('safar', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('safar', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
