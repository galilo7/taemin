<?php

use app\models\appmodels\AppHospitals;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model AppHospitals */

$this->title = Yii::t('hospitals', 'Update Policy');

//$this->params['breadcrumbs'][] = ['label' => Yii::t('hospitals', 'App Hospitals'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'Customers'), 'url' => Url::to(['customers/index'])];

$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'R Customer'), 'url' => Url::to(['customers/get-for-customer', 'id' => $model['r_customer']])];
$this->params['breadcrumbs'][] = Yii::t('hospitals', 'Update');
?>
<div class="app-hospitals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
