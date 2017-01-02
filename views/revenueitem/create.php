<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevenueItem */

$this->title = 'Create Revenue Item';
$this->params['breadcrumbs'][] = ['label' => 'Revenue Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revenue-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
