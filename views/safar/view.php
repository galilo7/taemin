<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSafar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('safar', 'App Safars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-safar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('safar', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('safar', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('safar', 'Are you sure you want to delete this item?'),
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
            'madmoun_name',
            'contract_date',
            'start_date',
            'end_date',
            'sale',
            'sale_letters',
            'paid',
            'paid_letters',
            'remaining',
            'coverage',
            'destination_country',
            'residence_country',
            'nationality',
            'sex',
            'passport_no',
            'birth',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
