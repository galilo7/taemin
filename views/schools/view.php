<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSchools */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('schools', 'App Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-schools-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('schools', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('schools', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('schools', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
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
            'school_name',
            'school_address',
            'school_type',
            'manager',
            'number_of_students',
            'student_price',
            'is_morning',
            'is_afternoon',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
