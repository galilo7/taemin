<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCompanies */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('companies', 'App Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-companies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('companies', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('companies', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('companies', 'Are you sure you want to delete this item?'),
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
            'phone1',
            'phone2',
            'address',
            'email',
            'website',
            'type',
            'reprisentative_name',
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
