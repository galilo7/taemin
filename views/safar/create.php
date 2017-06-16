<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSafar */

$this->title = Yii::t('safar', 'Create App Safar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('safar', 'App Safars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-safar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
