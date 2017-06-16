<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ForeignWorkersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('foreignworkers', 'App Foreign Workers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-foreign-workers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('foreignworkers', 'Create App Foreign Workers'), ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'kafil_name',
            // 'madmoun_name',
            // 'worker_nationality',
            // 'worker_sex',
            // 'worker_birth',
            // 'worker_passport_no',
            // 'worker_job',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
