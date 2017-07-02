<?php

use app\models\appmodels\AppMoneyTransfer;
use kartik\date\DatePicker;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppMoneyTransfer */
/* @var $form ActiveForm */
?>
<style>
    .mydatepicker {
        margin-bottom: 20px;
    }
</style>
<div class="app-money-transfer-form">

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
            $items, ['prompt' => Yii::t('money_transfer', 'Select Available Taemin,,, ')]
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
        echo '<label class="control-label comon">' . Yii::t("money_transfer", "Contract Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'contract_date',
            'options' => ['placeholder' => Yii::t('money_transfer', 'Enter contract date ...'),
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
        echo '<label class="control-label comon">' . Yii::t("money_transfer", "Start Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'start_date',
            'options' => ['placeholder' => Yii::t('money_transfer', 'Enter start date ...'),
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
echo '<label class="control-label comon">' . Yii::t("money_transfer", "End Date") . '</label>';
echo DatePicker::widget([
    'model' => $model,
    'type' => 2,
    'attribute' => 'end_date',
    'options' => ['placeholder' => Yii::t('money_transfer', 'Enter end date ...'),
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
echo $form->field($model, 'sale')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('money_transfer', 'Currency in LBP ...')]);
?>
    <?php // echo $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    $form->field($model, 'paid')->textInput()
    echo $form->field($model, 'paid')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('money_transfer', 'Currency in LBP ...')]);
    ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining')->textInput() ?>

    <?= $form->field($model, 'coverage')->textInput() ?>

    <?php
    //    $form->field($model, 'no_persons')->textInput()
    echo $form->field($model, 'no_persons')->textInput(['type' => 'number', 'min' => 0]);
    ?>

    <?php
//    $form->field($model, 'no_banks')->textInput();
    echo $form->field($model, 'no_banks')->textInput(['type' => 'number', 'min' => 0]);
    ?>

    <?php
//    $form->field($model, 'max_money')->textInput()
    echo $form->field($model, 'max_money')->textInput(['type' => 'number', 'min' => 0]);
    ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('money_transfer', 'Create') : Yii::t('moneytransfer', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
