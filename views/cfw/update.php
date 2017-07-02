<?php

use app\models\appmodels\AppCfw;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model AppCfw */

$this->title = Yii::t('cfw', 'Update {modelClass}: ', [
            'modelClass' => 'App Cfw',
        ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cfw', 'App Cfws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cfw', 'Update');
?>
<div class="app-cfw-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
