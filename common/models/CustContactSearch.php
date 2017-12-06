<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustContact;

/**
 * CustContactSearch represents the model behind the search form about `common\models\CustContact`.
 */
class CustContactSearch extends CustContact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cust_id', 'company_id', 'upd_date', 'cr_date', 'usrid'], 'integer'],
            [['contact_name', 'email', 'tel_m', 'tel_o', 'tel_h', 'remark', 'upd_by', 'cr_by', 'position'], 'safe'],
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
        $query = CustContact::find();

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
            'cust_id' => $this->cust_id,
            'company_id' => $this->company_id,
            'upd_date' => $this->upd_date,
            'cr_date' => $this->cr_date,
            'usrid' => $this->usrid,
        ]);

        $query->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel_m', $this->tel_m])
            ->andFilterWhere(['like', 'tel_o', $this->tel_o])
            ->andFilterWhere(['like', 'tel_h', $this->tel_h])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by])
            ->andFilterWhere(['like', 'cr_by', $this->cr_by])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
