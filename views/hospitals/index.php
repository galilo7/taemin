<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HospitalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('hospitals', 'App Hospitals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-hospitals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('hospitals', 'Create App Hospitals'), ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'birth',
            // 'sex',
            // 'is_in_out',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
