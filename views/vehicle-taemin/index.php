<?php

use app\models\VehicleTaeminSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel VehicleTaeminSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('vehicletaemin', 'App Vehicle Taemins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicle-taemin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('vehicletaemin', 'Create App Vehicle Taemin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'code',
            'taemin_name',
            'r_available_taemin',
            'r_customer',
            // 'madmoun_name',
            // 'contract_date',
            // 'start_date',
            // 'end_date',
            // 'sale',
            // 'sale_letters',
            // 'paid',
            // 'paid_letters',
            // 'remaining',
            // 'is_military',
            // 'r_vehicle',
            // 'coverage',
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
                                        'confirm' => Yii::t("vehicle-taemin", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        ]
                    ],],
            ]);
            ?>
</div>
