<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Company;

/**
 * CompanySearch represents the model behind the search form about `common\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'org_id', 'tax_id', 'company_type', 'province', 'district', 'postal_code', 'fax', 'phone_number'], 'integer'],
            [['company_name', 'address', 'cr_date', 'cr_by', 'upd_date', 'upd_by', 'status', 'guid', 'customer_code', 'country_code', 'contact_name', 'website'], 'safe'],
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
        $query = Company::find();

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
            'cr_date' => $this->cr_date,
            'upd_date' => $this->upd_date,
            'org_id' => $this->org_id,
            'tax_id' => $this->tax_id,
            'company_type' => $this->company_type,
            'province' => $this->province,
            'district' => $this->district,
            'postal_code' => $this->postal_code,
            'fax' => $this->fax,
            'phone_number' => $this->phone_number,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'cr_by', $this->cr_by])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'customer_code', $this->customer_code])
            ->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
