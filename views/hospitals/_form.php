<?php

use app\models\appmodels\AppHospitals;
use kartik\date\DatePicker;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppHospitals */
/* @var $form ActiveForm */
?>
<style>
    .mydatepicker {
        margin-bottom: 20px;
    }
</style>
<div class="app-hospitals-form">

    <?php $form = ActiveForm::begin(); ?>

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
            $items, ['prompt' => Yii::t('hospitals', 'Select Available Taemin,,, ')]
    );
    ?> 

    <?php
    if (isset($model->customerName)) {
        echo $form->field($model, 'customerName')->textInput(['disabled' => true]);
    } else {
        echo $form->field($model, 'r_customer')->textInput();
    }
    ?>


    <?= $form->field($model, 'madmoun_name')->textInput(['maxlength' => true]) ?>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("hospitals", "Contract Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'contract_date',
            'options' => ['placeholder' => Yii::t('hospitals', 'Enter contract date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('m/d/Y'),
            ],
            'pluginOptions' => [
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("hospitals", "Start Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'start_date',
            'options' => ['placeholder' => Yii::t('hospitals', 'Enter start date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('m/d/Y'),
            ],
            'pluginOptions' => [
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("hospitals", "End Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'end_date',
            'options' => ['placeholder' => Yii::t('hospitals', 'Enter end date ...'),
                'class' => 'mydatepicker comon',
                'value' => date('m/d/Y', strtotime("-1 days +1 year")),
            ],
            'pluginOptions' => [
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>


    <?php
//    echo $form->field($model, 'percentage')->textInput(['type' => 'number', 'min' => 0, 'max' => 100]);
    echo $form->field($model, 'sale')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('hospitals', 'Currency in LBP ...')]);
    ?>
    <?php // echo $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    $form->field($model, 'paid')->textInput()
    echo $form->field($model, 'paid')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('hospitals', 'Currency in LBP ...')]);
    ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'coverage')->textInput() ?>

    <div class="mydatepicker">
        <?php
        echo '<label class="control-label comon">' . Yii::t("hospitals", "Birth") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'birth',
            'options' => [
//                'placeholder' => Yii::t('cfw', 'Enter contract date ...'),
                'class' => 'mydatepicker comon',
            ],
            'pluginOptions' => [
                'autoclose' => true,
            ]
        ]);
        ?>
    </div>

    <?php
//    echo $form->field($model, 'sex')->textInput(['maxlength' => true]);
    $items = ['ذكر' => 'ذكر', 'أنثى' => 'أنثى'];
    echo $form->field($model, 'sex')
            ->dropDownList($items);
    ?>
    <?= $form->field($model, 'is_in_out')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('hospitals', 'Create') : Yii::t('hospitals', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
