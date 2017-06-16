<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SafarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('safar', 'App Safars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-safar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('safar', 'Create App Safar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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
            // 'destination_country',
            // 'residence_country',
            // 'nationality',
            // 'sex',
            // 'passport_no',
            // 'birth',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
