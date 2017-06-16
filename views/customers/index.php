<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('customers', 'App Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-customers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('customers', 'Create App Customers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'first_name',
            'fathers_name',
            'last_name',
            'phone1',
            // 'phone2',
            // 'address',
            [
                'attribute' => 'is_wakil',
                'format' => 'html',
                'value' => function ($data) {
                    if ($data->is_wakil == 1) {
                        return Html::img(Yii::getAlias('@web') . '/images/comon/true.png', ['width' => '30px']);
                    }
                    return Html::img(Yii::getAlias('@web') . '/images/comon/no.png', ['width' => '30px']);
                },
            ], // 'created_at',
            // 'updated_at',
//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
//                                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                                    'class' => '',
                                    'data' => [
                                        'confirm' => Yii::t("customers", "Are you sure you want to delete this item?"),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>
    <!--        ],
        ]);
        ?>-->
</div>
