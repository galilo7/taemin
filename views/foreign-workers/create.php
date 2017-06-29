<?php

use app\models\appmodels\AppForeignWorkers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model AppForeignWorkers */

$this->title = $model->taemin_name;
$url1 = Url::toRoute(['/customers/index']);
$url2 = Url::toRoute(['/customers/get-for-customer', 'id' => $model->r_customer]);
$this->params['breadcrumbs'][] = ['label' => 'الزبائن', 'url' => $url1];
$this->params['breadcrumbs'][] = ['label' => 'الزبون', 'url' => $url2];
$this->params['breadcrumbs'][] = $this->title;
//$this->title = Yii::t('foreignworkers', 'Create App Foreign Workers');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('foreignworkers', 'App Foreign Workers'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-foreign-workers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
