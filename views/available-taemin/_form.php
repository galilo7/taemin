<?php

use app\models\appmodels\AppAvailableTaemin;
use app\models\appmodels\AppCompanies;
use app\models\appmodels\AppNewTaeminPolicy;
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

    <?php
//    echo $form->field($model, 'name')->textInput(['maxlength' => true]);
    ?>
    <?php
//    $table_name_items = ["حريق", "مسؤولية مدنية", "طوارئ عمل", "سرقة", "مدارس", "عمال أجانب", "استشفاء", "سفر", "إلزامي", "مادي", "", ""];
//    $table_name_items = ["حريق" => "حريق", "مسؤولية مدنية" => "مسؤولية مدنية", "طوارئ عمل" => "طوارئ عمل", "سرقة" => "سرقة", "مدارس" => "مدارس", "عمال أجانب" => "عمال أجانب", "استشفاء" => "استشفاء", "سفر" => "سفر", "إلزامي" => "إلزامي", "مادي" => "مادي", "", "", "", "", "", "", "", "", "", "", ""];
//    $table_name_items = ArrayHelper::map(AppCompanies::find()->all(), 'id', function($model, $defaultValue) {
//                return $model['name'];
//            });
    $table_name_items = AppNewTaeminPolicy::$taemin_name_items;
    echo $form->field($model, 'name', ['options' => ['class' => 'comon']])
            ->dropDownList($table_name_items, ['prompt' => Yii::t('available_taemin', 'Select Taemin ...')]);
    ?>
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
