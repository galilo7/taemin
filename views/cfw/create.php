<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppCfw */

$this->title = Yii::t('cfw', 'Create App Cfw');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cfw', 'App Cfws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-cfw-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
