<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCustomers */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('customers', 'App Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-customers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('customers', 'Insurance Policies'), ['customers/get-for-customer', 'id' => $model->id], ['class' => 'btn btn-success']); ?>

        <?= Html::a(Yii::t('customers', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('customers', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('customers', 'Are you sure you want to delete this item?'),
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
            'first_name',
            'fathers_name',
            'last_name',
            'phone1',
            'phone2',
            'address',
//            'is_wakil',
            [
                'attribute' => 'is_wakil',
                'format' => 'html',
                'value' => $model->is_wakil == 1 ? Html::img(Yii::getAlias('@web') . '/images/common/true.png', ['width' => '30px']) :
                        Html::img(Yii::getAlias('@web') . '/images/common/no.png', ['width' => '30px']),
            ],
            'created_at',
            'updated_at',
        ],
    ])
    ?>

</div>
