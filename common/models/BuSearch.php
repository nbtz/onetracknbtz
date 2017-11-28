<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bu;

/**
 * BuSearch represents the model behind the search form about `common\models\Bu`.
 */
class BuSearch extends Bu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id'], 'integer'],
            [['bu_name', 'upd_date', 'upd_by'], 'safe'],
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
        $query = Bu::find();

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
            'upd_date' => $this->upd_date,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'bu_name', $this->bu_name])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by]);

        return $dataProvider;
    }
}
