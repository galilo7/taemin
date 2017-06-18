<?php

use app\models\CompaniesSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel CompaniesSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('companies', 'App Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('companies', 'Create App Companies'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
            'description',
            'phone1',
            'phone2',
            // 'address',
            // 'email',
            // 'website',
            // 'type',
            // 'reprisentative_name',
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
                                        'confirm' => Yii::t("companies", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                        ]
                    ],],
            ]);
            ?>
</div>
