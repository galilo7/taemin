<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\appmodels\AppSchools */

$this->title = Yii::t('schools', 'Create App Schools');
$this->params['breadcrumbs'][] = ['label' => Yii::t('schools', 'App Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-schools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
