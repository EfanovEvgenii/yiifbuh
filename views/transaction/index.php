<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time',
            'title',
            'summa',
            [
                'attribute' => 'costItem_id',
                'value' => 'costItem.title',
            ],
            [
                'attribute' => 'revenueItem_id',
                'value' => 'revenueItem.title',
            ],
            [
                'attribute' => 'account_id',
                'value' => 'account.title',
            ],
            [
                'attribute' => 'transactionType_id',
                'value' => 'transactionType.title',
            ],
            [
                'attribute' => 'partner_id',
                'value' => 'partner.title',
            ],
            [
                'attribute' => 'project_id',
                'value' => 'project.title',
            ],
            'create_time',
            'update_time',
            // 'costItem_id',
            // 'revenueItem_id',
            // 'account_id',
            // 'transactionType_id',
            // 'partner_id',
            // 'project_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
