<?php

use app\models\appmodels\AppSchools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model AppSchools */

$this->title = $model->taemin_name;
$url1 = Url::toRoute(['/customers/index']);
$url2 = Url::toRoute(['/customers/get-for-customer', 'id' => $model->r_customer]);
$this->params['breadcrumbs'][] = ['label' => 'الزبائن', 'url' => $url1];
$this->params['breadcrumbs'][] = ['label' => 'الزبون', 'url' => $url2];
$this->params['breadcrumbs'][] = $this->title;
//$this->title = Yii::t('schools', 'Create App Schools');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('schools', 'App Schools'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-schools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
