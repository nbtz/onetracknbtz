<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustType;

/**
 * CustTypeSearch represents the model behind the search form about `common\models\CustType`.
 */
class CustTypeSearch extends CustType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'upd_date', 'cr_date'], 'integer'],
            [['type_code', 'type_name', 'upd_by', 'cr_by', 'pic_url'], 'safe'],
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
        $query = CustType::find();

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
            'company_id' => $this->company_id,
            'upd_date' => $this->upd_date,
            'cr_date' => $this->cr_date,
        ]);

        $query->andFilterWhere(['like', 'type_code', $this->type_code])
            ->andFilterWhere(['like', 'type_name', $this->type_name])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by])
            ->andFilterWhere(['like', 'cr_by', $this->cr_by])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url]);

        return $dataProvider;
    }
}
