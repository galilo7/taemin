<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('schools', 'App Schools');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-schools-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('schools', 'Create App Schools'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'contract_date',
            // 'start_date',
            // 'end_date',
            // 'sale',
            // 'sale_letters',
            // 'paid',
            // 'paid_letters',
            // 'remaining',
            // 'coverage',
            // 'school_name',
            // 'school_address',
            // 'school_type',
            // 'manager',
            // 'number_of_students',
            // 'student_price',
            // 'is_morning',
            // 'is_afternoon',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
