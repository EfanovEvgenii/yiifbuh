<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transaction;

/**
 * TransactionSearch represents the model behind the search form about `app\models\Transaction`.
 */
class TransactionSearch extends Transaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'costItem_id', 'revenueItem_id', 'account_id', 'transactionType_id', 'partner_id', 'project_id'], 'integer'],
            [['title', 'create_time', 'update_time', 'time'], 'safe'],
            [['summa'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Transaction::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'summa' => $this->summa,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'time' => $this->time,
            'costItem_id' => $this->costItem_id,
            'revenueItem_id' => $this->revenueItem_id,
            'account_id' => $this->account_id,
            'transactionType_id' => $this->transactionType_id,
            'partner_id' => $this->partner_id,
            'project_id' => $this->project_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
