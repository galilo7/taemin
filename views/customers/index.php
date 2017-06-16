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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'fathers_name',
            'last_name',
            'phone1',
            // 'phone2',
            // 'address',
            // 'is_wakil',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
