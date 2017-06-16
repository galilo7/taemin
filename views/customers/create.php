<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCustomers */

$this->title = Yii::t('customers', 'Create App Customers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('customers', 'App Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-customers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
