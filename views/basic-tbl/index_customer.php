<?php

use app\models\appmodels\AppAvailableTaemin;
use app\models\BasicTblSearch;
use kartik\select2\Select2;
use yii\data\ActiveDataProvider;
use yii\grid\DataColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $searchModel BasicTblSearch */
/* @var $dataProvider ActiveDataProvider */

//$this->title = Yii::t('basictbl', 'App Basic Tbls');
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];

$this->params['breadcrumbs'][] = $this->title;
//die(yii\helpers\VarDumper::dump(, 4, TRUE));
?>
<div class="app-basic-tbl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div>
        <!--<p>-->
        <?php
//            $form = ActiveForm::begin();
//        $var;
//        $model = new AppNewTaeminPolicy();
        echo $this->render('_form_taemin_name_index_customer', [
            'taeminNamemodel' => $taeminNamemodel,
            'customerId' => $customer->id,
        ]);
//        echo Html::a(Yii::t('basictbl', 'Create App Basic Tbl'), ['create-policy'], ['class' => 'btn btn-success', 'style' => 'display: none;']);
//        ActiveForm::end();
        ?>
        <!--</p>-->
    </div>

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
//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $idx = $model['id'];
                        $id = idxToid($idx);
                        $url = idxToAction($idx, 'view-from-customer');
                        $res = Url::to([$url, 'id' => $id]);
//                        die($res);
//                        $url = Url::to(['basic-tbl/view', 'id' => $model['id']]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $res, [
                                    'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },
                    'update' => function ($url, $model) {
                        $idx = $model['id'];
                        $id = idxToid($idx);
                        $url = idxToAction($idx, 'update-from-customer');
                        $res = Url::to([$url, 'id' => $id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $res, [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        $idx = $model['id'];
                        $id = idxToid($idx);
                        $url = idxToAction($idx, 'delete-from-customer');
                        $res = Url::to([$url, 'id' => $id]);
//                        $url = Url::to(['basic-tbl/delete', 'id' => $model['id']]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $res, [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => Yii::t("customers", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                ],
//                'urlCreator' => function ($action, $model, $key, $index) {
//                    if ($action === 'view') {
//                        $url = 'index.php?r=client-login/lead-view&id=' . $model->id;
//                        return $url;
//                    }
//
//                    if ($action === 'update') {
//                        $url = 'index.php?r=client-login/lead-update&id=' . $model->id;
//                        return $url;
//                    }
//                    if ($action === 'delete') {
//                        $url = 'index.php?r=client-login/lead-delete&id=' . $model->id;
//                        return $url;
//                    }
//                }
            ],
        ],
    ]);

    function idxToAction($idX = "", $action) {
        $del = strpos($idX, '+');
        $tbl = substr($idX, 0, $del);
//        $id = substr($idX, $del + 1, strlen($idX) - 1);
//        die($tbl);
        switch ($tbl) {
            case 'cfw' :
                $url = 'cfw/' . $action;
                break;

            case 'foreign-workers' :
                $url = 'foreign-workers/' . $action;
                break;

            case 'hospitals' :
                $url = 'hospitals/' . $action;
                break;

            case 'money-transfer' :
                $url = 'money-transfer/' . $action;
                break;

            case 'safar' :
                $url = 'safar/' . $action;
                break;

            case 'schools' :
                $url = 'schools/' . $action;
                break;

            case 'vahicle-taemin' :
                $url = 'vahicle-taemin/' . $action;
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
