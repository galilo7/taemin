<?php

//use Yii;


use app\assets\PoliciesAsset;
use app\models\appmodels\AppCfw;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppCfw */
/* @var $form ActiveForm */

PoliciesAsset::register($this);
$uploadPath = 'uploads/'
?>
<style>
    .mydatepicker {
        margin-bottom: 20px;
    }
</style>
<div class="app-cfw-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taemin_name')->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?php
//    echo $form->field($model, 'r_available_taemin')->textInput();
    ?>
    <?php
//    $allAvailableTaeminIds = AppAvailableTaemin::find(['id'])->where(['name' => $model->taemin_name])->all();
//    die(yii\helpers\VarDumper::dump($allAvailableTaeminIds, 4, true));
//    $items = ArrayHelper::map(AppCompanies::find()->where(['id' => $allAvailableTaeminIds])->all(), 'id', 'name');
//    die(yii\helpers\VarDumper::dump($items, 4, true));
//    $myTest = AppAvailableTaemin::find()->where(['id' => 1])->one()->companies;
//    $myTest = AppAvailableTaemin::find()->select('id', 'r_company')->where(['name' => $model->taemin_name])->all();
//
//    $items = ArrayHelper::map(AppAvailableTaemin::find()->where(['name' => $model->taemin_name])->all(), 'id', 'companies');
//    $subQuery = BaseFollower::find()->select('id');
//    $subQuery = (new \yii\db\Query())
//            ->select('id')
//            ->from(['available_taemin'])
//            ->where(['name' => $model->taemin_name])
//            ->leftJoin('companies', 'id', 'acailable_taemin.r_company')
//            ->all();
//    $subQuery = (new \yii\db\Query())
//            ->from(['companies', 'available_taemin'])
//            ->where(['available_taemin.name' => $model->taemin_name])
//            ->leftJoin('available_taemin', 'available_taemin.r_company', 'companies.id')
//            ->all();
//    die(VarDumper::dump($subQuery, 4, true));
//    $query = (new \yii\db\Query())
//            ->select(['available_taemin.id', 'companies.name'])
//            ->from(['available_taemin', 'companies'])
//            ->where(['companies.id=:status' => 1])
//            ->andWhere(['available_taemin.name=:taeminName', [':taeminName' => $model->taemin_name]]);
//    $query->addParams([':taeminName' => $model->taemin_name]);
    $query = (new Query())
            ->select(['companies.name AS name', 'available_taemin.id as id'])
            ->from('companies')
            ->where(['available_taemin.name' => $model->taemin_name])
            ->leftJoin('available_taemin', 'available_taemin.r_company = companies.id');
    $rows = $query->all();

//    $items = ArrayHelper::map($rows, 'id', 'name');
//    die(VarDumper::dump($rows, 4, true));
//    $items = ArrayHelper::map(AppAvailableTaemin::find()->where(['name' => $model->taemin_name])->all(), 'id', 'companies');
    $items = ArrayHelper::map($rows, 'id', 'name');
//    die(VarDumper::dump($items, 4, true));

    echo $form->field($model, 'r_available_taemin')->dropDownList(
            $items, ['prompt' => Yii::t('cfw', 'Select Available Taemin,,, ')]
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
        echo '<label class="control-label comon">' . Yii::t("cfw", "Contract Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'contract_date',
            'options' => ['placeholder' => Yii::t('cfw', 'Enter contract date ...'),
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
        echo '<label class="control-label comon">' . Yii::t("cfw", "Start Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'start_date',
            'options' => ['placeholder' => Yii::t('cfw', 'Enter start date ...'),
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
        echo '<label class="control-label comon">' . Yii::t("cfw", "End Date") . '</label>';
        echo DatePicker::widget([
            'model' => $model,
            'type' => 2,
            'attribute' => 'end_date',
            'options' => ['placeholder' => Yii::t('cfw', 'Enter end date ...'),
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
//        
    ?>
    <?php echo $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'sale_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    $form->field($model, 'paid')->textInput()
    echo $form->field($model, 'paid')->textInput(['type' => 'number', 'min' => 0, 'placeHolder' => Yii::t('cfw', 'Currency in LBP ...')]);
    ?>

    <?= $form->field($model, 'paid_letters')->textInput(['maxlength' => true]) ?>

    <?php
//    echo $form->field($model, 'remaining')->textInput();
//    echo $form->field($model, 'coverage')->textInput();
    ?>



    <?= $form->field($model, 'property_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_workers')->textInput() ?>

    <?= $form->field($model, 'building')->textInput(['maxlength' => true]) ?>

    <?php
//    echo $form->field($model, 'reserve')->textInput(['maxlength' => true]);
    ?>

    <?php
    if ($model->field) {
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['multiple' => false],
            'pluginOptions' => [
                'initialPreview' => [
//                    'file:///home/user/Desktop/1The_Industrial_Investor_Guide_of_Iraq_Arabic_Final_Aug18_2012.pdf',
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('cfw', 'Create') : Yii::t('cfw', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

