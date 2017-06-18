<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppHospitals */

$this->title = Yii::t('hospitals', 'Create App Hospitals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('hospitals', 'App Hospitals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-hospitals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
