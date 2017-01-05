<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
class BaseModel extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
       return [
           [
               'class' => TimestampBehavior::className(),
               'createdAtAttribute' => 'create_time',
               'updatedAtAttribute' => 'update_time',
               'value' => new Expression('NOW()'),
           ],
       ];
    }
}
