<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvailableTaeminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-available-taemin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'r_company') ?>

    <?= $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'percentage') ?>

    <?php // echo $form->field($model, 'price_description') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('available_taemin', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('available_taemin', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
