<?php

use app\models\appmodels\AppAvailableTaemin;
use app\models\appmodels\AppCompanies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppAvailableTaemin */
/* @var $form ActiveForm */
?>

<div class="app-available-taemin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
//    echo $form->field($model, 'r_company')->textInput();
    ?>

    <?php
    $items = ArrayHelper::map(AppCompanies::find()->all(), 'id', function($model, $defaultValue) {
                return $model['name'];
            });
    echo $form->field($model, 'r_company', ['options' => ['class' => 'comon']])
            ->dropDownList($items, ['prompt' => Yii::t('available_taemin', 'Select a Company ...')]);
    ?>

    <?= $form->field($model, 'cost')->textInput(['type' => 'number', 'min' => 0]) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => 0]) ?>

    <?= $form->field($model, 'percentage')->textInput(['type' => 'number', 'min' => 0, 'max' => 100]) ?>

    <?= $form->field($model, 'price_description')->textInput(['maxlength' => true]) ?>

    <?php
//    $items = ['خاص' => 'خاص', 'رسمي' => 'رسمي'];

    $items = ['كاش' => 'كاش', 'جاري' => 'جاري'];

    echo $form->field($model, 'type')->dropDownList($items, ['prompt' => Yii::t('available_taemin', 'Select Type (cash / Jare) ...')]);
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('available_taemin', 'Create') : Yii::t('available_taemin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
