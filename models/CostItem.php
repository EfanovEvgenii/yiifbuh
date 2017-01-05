<?php

namespace app\models;

/**
 * This is the model class for table "costitem".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 *
 * @property Transaction[] $transactions
 */
class CostItem extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id'], 'integer'],
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
        return $this->hasMany(Transaction::className(), ['costItem_id' => 'id']);
    }
}
