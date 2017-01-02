<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CostItem */

$this->title = 'Create Cost Item';
$this->params['breadcrumbs'][] = ['label' => 'Cost Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
