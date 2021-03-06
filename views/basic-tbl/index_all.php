<?php

use app\models\appmodels\AppAvailableTaemin;
use app\models\appmodels\AppCustomers;
use app\models\BasicTblSearch;
use kartik\select2\Select2;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\grid\DataColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel BasicTblSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('basictbl', 'App Basic Tbls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-basic-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>

    <p>
        <?= Html::a(Yii::t('basictbl', 'Create App Basic Tbl'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'code',
//            'r_available_taemin',
            [
                'class' => DataColumn::className(),
                'attribute' => 'r_available_taemin',
                'label' => Yii::t('available_taemin', 'Available Taemin Name'),
                'value' => function ($model) {

                    if ($model) {
                        return Html::a($model['taemin_name'], ['available-taemin/view', 'id' => $model['r_available_taemin']], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'options' => [
                    'width' => '150px',
                ],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'r_available_taemin',
                    'data' => ArrayHelper::map(AppAvailableTaemin::find()->select(
                                            ['id', 'name'])
                                    ->asArray()
                                    ->all(), 'id', 'name'),
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'options' => [
                        'placeholder' => Yii::t('basictbl', 'Select Available Taemin'),
                        'dir' => 'rtl',
                    ]
                ]),
                'format' => 'raw',
            ],
            'madmoun_name',
            'remaining',
            'end_date',
            ///////////////////////////////////////////////////
            [
                'class' => DataColumn::className(),
                'attribute' => 'r_customer',
                'label' => Yii::t('basictbl', 'Full Name Of Customer'),
                'value' => function ($model) {

                    if ($model) {
                        return Html::a($model['first_name'] . " " . $model['fathers_name'] . " " . $model['last_name'], ['customers/view', 'id' => $model['r_customer']], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'options' => [
                    'width' => '150px',
                ],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'r_customer',
                    'data' => ArrayHelper::map(AppCustomers::find()->select(
//                                            ['id', 'fullName'])
                                            ['id', new Expression('CONCAT(first_name, " ",fathers_name," ",last_name) as fullName')])
                                    ->asArray()
                                    ->all(), 'id', 'fullName'),
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'options' => [
                        'placeholder' => Yii::t('basic_tbl', 'Select Customer Name'),
                        'dir' => 'rtl',
                    ]
                ]),
                'format' => 'raw',
            ],
            ///////////////////////////////////////////////////
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    function idxToAction($idX = "") {
        $del = strpos($idX, '+');
        $tbl = substr($idX, 0, $del - 1);
//        $id = substr($idX, $del + 1, strlen($idX) - 1);

        switch ($tbl) {
            case 'cfw' :
                $url = 'cfw/view';

                break;
            default : return NULL;
        }
        return $url;
    }

    function idxToid($idX) {
        $del = strpos($idX, '+');
        $id = substr($idX, $del + 1, strlen($idX) - 1);

        return $id;
    }

    $url = "";
    ?>
</div>
