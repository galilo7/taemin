<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppForeignWorkers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-foreign-workers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('foreignworkers', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('foreignworkers', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('foreignworkers', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'r_available_taemin',
            'r_customer',
            'contract_date',
            'start_date',
            'end_date',
            'sale',
            'sale_letters',
            'paid',
            'paid_letters',
            'remaining',
            'coverage',
            'kafil_name',
            'madmoun_name',
            'worker_nationality',
            'worker_sex',
            'worker_birth',
            'worker_passport_no',
            'worker_job',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
