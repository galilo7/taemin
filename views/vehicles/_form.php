<?php

use app\models\appmodels\AppVehicles;
use etsoft\widgets\YearSelectbox;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppVehicles */
/* @var $form ActiveForm */
?>

<div class="app-vehicles-form">

    <?php
    $form = ActiveForm::begin();
    ?>

    <?php
//    echo $form->field($model, 'type')->textInput(['maxlength' => true]);

    $types = ["سيارة", "دراجة نارية", "رابيد", "فان", "بيكاب"];
    echo $form->field($model, 'type')->dropDownList(
            $types, // Flat array ('id'=>'label')
            ['prompt' => 'اختر فئة الآلية ...']    // options
    );
    ?>

    <?php
    echo $form->field($model, 'model')->textInput(['maxlength' => true]);
//    $models = ["bmw", "mercedes", "nissan", "toyota", "ford", "chevrolet", "", "", "", "", "", "", ""];
//    echo $form->field($model, 'model')->dropDownList(
//            $types, // Flat array ('id'=>'label')
//            ['prompt' => 'اختر نوع الآلية']    // options
//    );
    ?>

    <?= $form->field($model, 'vehicle_usage')->textInput(['maxlength' => true]) ?>

    <?php
//    echo $form->field($model, 'year')->textInput();
    echo $form->field($model, 'year')->widget(YearSelectbox::classname(), [
        'yearStart' => 0,
        'yearEnd' => -150,
    ]);
    ?>


    <?= $form->field($model, 'net_load')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'registration_number')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'horses')->textInput(['type' => 'number', 'min' => 0])
    ?>

    <?= $form->field($model, 'passengers')->textInput(['type' => 'number', 'min' => 0])
    ?>

    <?= $form->field($model, 'shecci_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_number')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'preview_month')->textInput();
    $months = [1 => "كانون الثاني", 2 => "شباط", 3 => "آذار", 4 => "نيسان", 5 => "أيار", 6 => "حزيران", 7 => "تموز", 8 => "آب", 9 => "أيلول", 10 => "تشرين الأول", 11 => "تشرين الثاني", 12 => "كانون الأول"];
    echo $form->field($model, 'preview_month')->dropDownList(
            $months, // Flat array ('id'=>'label')
            ['prompt' => 'اختر شهر المعاينة ...']    // options
    );
    ?>

    <?= $form->field($model, 'preview_cost')->textInput(['type' => 'number', 'min' => 0]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('vehicles', 'Create') : Yii::t('vehicles', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
