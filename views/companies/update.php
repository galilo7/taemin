<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCompanies */

$this->title = Yii::t('companies', 'Update') . ' ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('companies', 'App Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('companies', 'Update');
?>
<div class="app-companies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
