<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppForeignWorkers */

$this->title = Yii::t('foreignworkers', 'Create App Foreign Workers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-foreign-workers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
