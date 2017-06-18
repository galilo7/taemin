<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppVehicles */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('vehicles', 'App Vehicles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-vehicles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('vehicles', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('vehicles', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('vehicles', 'Are you sure you want to delete this item?'),
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
            'type',
            'model',
            'vehicle_usage',
            'year',
            'net_load',
            'registration_number',
            'horses',
            'passengers',
            'shecci_number',
            'engine_number',
            'preview_month',
            'preview_cost',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
