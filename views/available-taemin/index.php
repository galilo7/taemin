<?php

use app\models\AvailableTaeminSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel AvailableTaeminSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('available_taemin', 'App Available Taemins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-available-taemin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('available_taemin', 'Create App Available Taemin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
//            'description',
//            'r_company',
            'companyName',
            'cost',
            'price',
            // 'percentage',
            // 'price_description',
            'type',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
//                                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => Yii::t("available_taemin", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                ]
            ],],
    ]);
    ?>
</div>
