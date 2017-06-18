<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppAvailableTaemin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('available_taemin', 'App Available Taemins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-available-taemin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('available_taemin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('available_taemin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('available_taemin', 'Are you sure you want to delete this item?'),
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
            'name',
            'description',
            'r_company',
            'cost',
            'price',
            'percentage',
            'price_description',
            'type',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
