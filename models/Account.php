<?php

namespace app\models;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 *
 * @property Transaction[] $transactions
 */
class Account extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 150],
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['account_id' => 'id']);
    }

}
