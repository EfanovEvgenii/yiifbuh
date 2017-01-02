<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property string $title
 * @property string $summa
 * @property string $create_time
 * @property string $update_time
 * @property string $time
 * @property integer $costItem_id
 * @property integer $revenueItem_id
 * @property integer $account_id
 * @property integer $transactionType_id
 * @property integer $partner_id
 * @property integer $project_id
 *
 * @property Account $account
 * @property Costitem $costItem
 * @property Partner $partner
 * @property Project $project
 * @property Revenueitem $revenueItem
 * @property Transactiontype $transactionType
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'summa', 'time', 'costItem_id', 'revenueItem_id', 'account_id', 'transactionType_id', 'partner_id', 'project_id'], 'required'],
            [['id', 'costItem_id', 'revenueItem_id', 'account_id', 'transactionType_id', 'partner_id', 'project_id'], 'integer'],
            [['summa'], 'number'],
            [['create_time', 'update_time', 'time'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Account::className(), 'targetAttribute' => ['account_id' => 'id']],
            [['costItem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costitem::className(), 'targetAttribute' => ['costItem_id' => 'id']],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['revenueItem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Revenueitem::className(), 'targetAttribute' => ['revenueItem_id' => 'id']],
            [['transactionType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Transactiontype::className(), 'targetAttribute' => ['transactionType_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'summa' => 'Summa',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'time' => 'Time',
            'costItem_id' => 'Cost Item ID',
            'revenueItem_id' => 'Revenue Item ID',
            'account_id' => 'Account ID',
            'transactionType_id' => 'Transaction Type ID',
            'partner_id' => 'Partner ID',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostItem()
    {
        return $this->hasOne(Costitem::className(), ['id' => 'costItem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(Partner::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevenueItem()
    {
        return $this->hasOne(Revenueitem::className(), ['id' => 'revenueItem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionType()
    {
        return $this->hasOne(Transactiontype::className(), ['id' => 'transactionType_id']);
    }
}
