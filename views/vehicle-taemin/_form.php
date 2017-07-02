<?php

use app\models\appmodels\AppVehicles;
use app\models\appmodels\AppVehicleTaemin;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppVehicleTaemin */
/* @var $form ActiveForm */
?>
<style>
    .mydatepicker {
        margin-bottom: 20px;
    }
</style>
<div class="app-vehicle-taemin-form">

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
            $items, ['prompt' => Yii::t('vehicle_taemin', 'Select Available Taemin,,, ')]
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
        echo '<label class="control-label comon">' . Yii::t("vehicle_taemin", "Contract Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'contract_date',
            'options' => ['placeholder' => Yii::t('vehicle_taemin', 'Enter contract date ...'),
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
        echo '<label class="control-label comon">' . Yii::t("vehicle_taemin", "Start Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'start_date',
            'options' => ['placeholder' => Yii::t('vehicle_taemin', 'Enter start date ...'),
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
        echo '<label class="control-label comon">' . Yii::t("vehicle_taemin", "End Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'end_date',
            'options' => ['placeholder' => Yii::t('vehicle_taemin', 'Enter end date ...'),
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
    echo $form->field($model, 'sale')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('vehicle_taemin', 'Currency in LBP ...')]);
    ?>
    <?php // echo $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    $form->field($model, 'paid')->textInput()
    echo $form->field($model, 'paid')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('vehicle_taemin', 'Currency in LBP ...')]);
    ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'is_military')->checkbox() ?>

    <?php
//    echo $form->field($model, 'r_vehicle')->textInput();
    $itemsVehicles = ArrayHelper::map(AppVehicles::find()->all(), 'id', 'registration_number');
//    die(\yii\helpers\VarDumper::dump($itemsVehicles, 4, true));
//    $itemsVehicles = [
//        [1 => '113'],
//        [2 => '4152'],
//        [3 => '111'],
//    ];
//    $itemsVehicles = json_encode($itemsVehicles);
    echo $form->field($model, 'r_vehicle')
            ->widget(Select2::classname(), [
                'name' => 'r_vehicle',
                'data' => $itemsVehicles,
                'size' => Select2::MEDIUM,
                'options' => [
                    'placeholder' => Yii::t('vehicle_taemin', 'Select By Registration Number,,,'),
                    'dir' => 'rtl'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                    ]
    );
//    );
//    echo $form->field($model, 'r_vehicle')->widget(TypeaheadBasic::classname(), [
//        'data' => $itemsVehicles,
//        'rtl' => true,
//        'dataset' => [
//            [
//                'local' => $itemsVehicles,
//                'limit' => 10
//            ],
//        ],
//        'pluginOptions' => ['highlight' => true],
//        'options' => ['placeholder' => Yii::t('vehicle_taemin', 'Select By Registration Number,,,')],
//    ]);
//    echo $form->field($model, 'r_vehicle')->dropDownList(
//            $itemsVehicles, ['prompt' => Yii::t('vehicle_taemin', 'Select By Registration Number,,,')]
//    );
//    echo AutoComplete::widget([
//        'name' => 'Vehicle',
//        'id' => 'ddd',
//        'clientOptions' => [
//            'source' => $itemsVehicles,
//            'autoFill' => true,
//            'select' => new JsExpression("function( event, ui ) {
//        $('#city-state_name').val(ui.item.id);//#City-state_name is the id of hiddenInput.
//     }")],
//    ]);
    ?>

    <?= $form->field($model, 'coverage')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('vehicle_taemin', 'Create') : Yii::t('vehicle_taemin', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
