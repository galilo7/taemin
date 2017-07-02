<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'name',
        'pageSummary' => Yii::t('companies', 'Page Total'),
        'vAlign' => 'middle',
        'headerOptions' => ['class' => 'kv-sticky-column'],
        'contentOptions' => ['class' => 'kv-sticky-column'],
        'editableOptions' => ['header' => 'Code', 'size' => 'md']
    ],
//        [
//            'attribute' => 'color',
//            'value' => function ($model, $key, $index, $widget) {
//                return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" .
//                        $model->color . '</code>';
//            },
//            'filterType' => GridView::FILTER_COLOR,
//            'vAlign' => 'middle',
//            'format' => 'raw',
//            'width' => '150px',
//            'noWrap' => true
//        ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'description',
        'vAlign' => 'middle',
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'phone1',
        'vAlign' => 'middle',
    ],
    [
        'class' => 'kartik\grid\BooleanColumn',
        'attribute' => 'phone2',
        'vAlign' => 'middle',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
//            'dropdown' => true,
        'buttons' => [
            'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => Yii::t("companies", "Are you sure you want to delete this item?"),
                                'method' => 'post',
                            ],
                ]);
            }
        ],
//            'buttons' => [
//                'delete' => function ($url, $model, $key) {
////                    return Html::a('Statement', $url, ['onClick' => 'return confirm(Yii::t("companies", "Are you sure you want to delete this item?")']);
//                    return Html::a('Statement', $url, ['onClick' => 'return confirm("' . Yii::t("companies", "Are you sure you want to delete this item?") . '")']);
//                }
//            ],
        'vAlign' => 'middle',
        'urlCreator' => function( $action, $model, $key, $index) {
            if ($action == "view") {
                return Url::to(["companies/view", 'id' => $key]);
            } elseif ($action == "update") {
                return Url::to(["companies/update", 'id' => $key]);
            } elseif ($action == "delete") {
                return Url::to(["companies/delete", 'id' => $key]);
            } else {
                return "#";
            }
        },
        'viewOptions' => ['title' => Yii::t('companies', "View"), 'data-toggle' => 'tooltip'],
        'updateOptions' => ['title' => Yii::t('companies', "Update"), 'data-toggle' => 'tooltip'],
//            'updateOptions' => ['title' => "updateMsg", 'data-toggle' => 'tooltip'],
//            'deleteOptions' => ['title' => Yii::t('companies', "Delete"), 'data-toggle' => 'tooltip'],
    ],
    ['class' => 'kartik\grid\CheckboxColumn']
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
//        'beforeHeader' => [
//            [
//                'columns' => [
//                    ['content' => 'Header Before 1', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
//                    ['content' => 'Header Before 2', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
//                    ['content' => 'Header Before 3', 'options' => ['colspan' => 3, 'class' => 'text-center warning']],
//                ],
//                'options' => ['class' => 'skip-export'] // remove this row from export
//            ]
//        ],
    'toolbar' => [
        ['content' =>
//                Html::button('&lt;i class="glyphicon glyphicon-plus">&lt;/i>', ['type' => 'button', 'title' => Yii::t('companies', 'Create Company'), 'class' => 'btn btn-success', 'onclick' => 'location.href="' . Yii::$app->urlManager->createUrl('localhost/taemin/companies/create')]) . ' ' .
//                Html::button('&lt;i class="glyphicon glyphicon-plus">&lt;/i>', ['type' => 'button', 'title' => Yii::t('companies', 'Create Company'), 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
            Html::a(Yii::t('companies', 'Create App Companies'), ['create'], ['data-pjax' => 0, 'class' => 'btn btn-success', 'title' => Yii::t('companies', 'Create')]) .
            Html::a(Yii::t('companies', 'Reset'), ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-primary', 'title' => Yii::t('companies', 'Reset')])
        ],
        '{export}',
        '{toggleData}'
    ],
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
//        'floatHeaderOptions' => ['scrollingTop' => $scrollingTop],
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY
    ],
]);
?>