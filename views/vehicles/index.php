<?php

use app\models\VehiclesSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel VehiclesSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('vehicles', 'App Vehicles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('vehicles', 'Create App Vehicles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'type',
            'model',
            'vehicle_usage',
            'year',
            // 'net_load',
            // 'registration_number',
            // 'horses',
            // 'passengers',
            // 'shecci_number',
            // 'engine_number',
            // 'preview_month',
            // 'preview_cost',
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
                                        'confirm' => Yii::t("vehicles", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        ]
                    ],],
            ]);
            ?>
</div>
