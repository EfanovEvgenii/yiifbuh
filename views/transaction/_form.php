<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Transaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'costItem_id')->dropDownList(
        ArrayHelper::map($costItem, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'revenueItem_id')->dropDownList(
        ArrayHelper::map($revenueItem, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'account_id')->dropDownList(
        ArrayHelper::map($account, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'transactionType_id')->dropDownList(
        ArrayHelper::map($transactionType, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'partner_id')->dropDownList(
        ArrayHelper::map($partner, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'project_id')->dropDownList(
        ArrayHelper::map($project, 'id', 'title')
    ) ?>

    <p>Дата создания:<?= Html::label($model->create_time) ?>
        Дата изменения:<?= Html::label($model->update_time) ?></p>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
