<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppBasicTbl */

$this->title = Yii::t('basictbl', 'Create App Basic Tbl');
$this->params['breadcrumbs'][] = ['label' => Yii::t('basictbl', 'App Basic Tbls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-basic-tbl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
