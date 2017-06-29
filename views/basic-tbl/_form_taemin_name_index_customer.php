<?php

use app\models\appmodels\AppCfw;
use app\models\appmodels\AppNewTaeminPolicy;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model AppCfw */
/* @var $form ActiveForm */
?>
<style>
    .myDropdown {
        width: 30%;
        display: inline-block;
    }
    .myBtnGroup {
        margin-right: 10%;
        display: inline-block;
    }
</style>
<div class="app-cfw-form">
    <?php
    $form = ActiveForm::begin([
                'action' => Url::to(['basic-tbl/create-for-customer', 'customerId' => $customerId, 'customerName' => $customerName])
    ]);
    ?>

    <?php
    $form->field($taeminNamemodel, 'selectedTaeminName')->textInput(['maxlength' => true]);



    //    $table_name_items = ArrayHelper::map(AppCompanies::find()->all(), 'id', function($model, $defaultValue) {
    //                return $model['name'];
    //            });
    $table_name_items = AppNewTaeminPolicy::$taemin_name_items;
    echo $form->field($taeminNamemodel, 'selectedTaeminName', ['options' => ['class' => 'comon myDropdown']])
            ->dropDownList($table_name_items, ['prompt' => Yii::t('available_taemin', 'Select Taemin ...')
//                , ['options' =>
//                    ['Selected' => 'toggleSunbmitBtnShow()']
//                ]
    ]);
    ?>

    <div class="form-group myBtnGroup">
        <?php
        echo Html::submitButton(Yii::t('basictbl', 'Create App Basic Tbl'), ['class' => 'btn btn-success']);
        ?>
    </div>
    <?php // $form->end();    ?>
    <?php
    ActiveForm::end();
//    $this->endBlock();
    ?>


</div>
<!--<script type="text/javascript">
    function toggleSunbmitBtnShow() {
        alert("hhsohdk");
    }
</script>-->