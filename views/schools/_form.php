<?php

use app\assets\PoliciesAsset;
use app\models\appmodels\AppSchools;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppSchools */
/* @var $form ActiveForm */
PoliciesAsset::register($this);
$uploadPath = 'uploads/'
?>
<style>
    .mydatepicker {
        margin-bottom: 20px;
    }
</style>
<div class="app-schools-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taemin_name')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?php
    $query = (new Query())
            ->select(['companies.name AS name', 'available_taemin.id as id'])
            ->from('companies')
            ->where(['available_taemin.name' => $model->taemin_name])
            ->leftJoin('available_taemin', 'available_taemin.r_company = companies.id');
    $rows = $query->all();

    $items = ArrayHelper::map($rows, 'id', 'name');

    echo $form->field($model, 'r_available_taemin')->dropDownList(
            $items, ['prompt' => Yii::t('schools', 'Select Available Taemin,,,')]
    );
    ?> 

    <?php
    if (isset($model->customerName)) {
        echo $form->field($model, 'customerName')->textInput(['disabled' => true]);
    } else {
        echo $form->field($model, 'r_customer')->textInput();
    }
    ?>



    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("schools", "Contract Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'contract_date',
            'options' => ['placeholder' => Yii::t('schools', 'Enter contract date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('Y-m-d'),
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]);
        ?>
    </div>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("schools", "Start Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'start_date',
            'options' => ['placeholder' => Yii::t('schools', 'Enter start date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('Y-m-d'),
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]);
        ?>
    </div>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("schools", "End Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'end_date',
            'options' => ['placeholder' => Yii::t('schools', 'Enter end date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('Y-m-d', strtotime("-1 days +1 year")),
            ],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ]
        ]);
        ?>
    </div>


    <?php
//    echo $form->field($model, 'percentage')->textInput(['type' => 'number', 'min' => 0, 'max' => 100]);
    echo $form->field($model, 'sale')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('schools', 'Currency in LBP ...')]);
    ?>
    <?php // echo $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    $form->field($model, 'paid')->textInput()
    echo $form->field($model, 'paid')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('schools', 'Currency in LBP ...')]);
    ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'coverage')->textInput() ?>

    <?= $form->field($model, 'school_name')->textInput() ?>

    <?= $form->field($model, 'school_address')->textInput() ?>

    <?= $form->field($model, 'school_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>

    <?php
//    echo $form->field($model, 'number_of_students')->textInput();
    echo $form->field($model, 'number_of_students')->textInput(['type' => 'number', 'min' => 0]);
    ?>

    <?php
//    echo $form->field($model, 'student_price')->textInput();
    echo $form->field($model, 'student_price')->textInput(['type' => 'number', 'min' => 0]);
    ?>

    <?= $form->field($model, 'is_morning')->checkbox() ?>

    <?= $form->field($model, 'is_afternoon')->checkbox() ?>

    <?php
//    echo $form->field($model, 'field')->textInput(['maxlength' => true]);
    if ($model->field) {
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['multiple' => false],
            'pluginOptions' => [
                'initialPreview' => [
                    Url::to('@web/' . $uploadPath . $model->field),
                ],
                'showUpload' => false,
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => [
                    ['caption' => "البوليصة", 'size' => '873727'],
                ],
                'overwriteInitial' => TRUE,
                'maxFileSize' => 2800,
                'allowedFileExtensions' => ['pdf'],
            ],
            'pluginEvents' => [
                "fileclear" => "function() { id='" . $model->id . "' ;"
                . "clearFile(id); }",
                "filereset" => "function() { alert('filereset'); }",
            ],
                ]
        );
    } else {
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['multiple' => false],
            'pluginOptions' => [
                'previewFileType' => 'pdf'
            ]
        ]);
    }
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('schools', 'Create') : Yii::t('schools', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
