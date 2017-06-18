<?php

use app\models\HospitalsSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel HospitalsSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('hospitals', 'App Hospitals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-hospitals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('hospitals', 'Create App Hospitals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'code',
            'r_available_taemin',
            'r_customer',
            'madmoun_name',
            // 'contract_date',
            // 'start_date',
            // 'end_date',
            // 'sale',
            // 'sale_letters',
            // 'paid',
            // 'paid_letters',
            // 'remaining',
            // 'coverage',
            // 'birth',
            // 'sex',
            // 'is_in_out',
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
                                        'confirm' => Yii::t("hospitals", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        ]
                    ],],
            ]);
            ?>
</div>
