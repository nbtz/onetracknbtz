<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CheckIn;

/**
 * CheckInSearch represents the model behind the search form about `common\models\CheckIn`.
 */
class CheckInSearch extends CheckIn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'usrid', 'cust_id', 'company_id', 'what_id', 'cust_type_id', 'cust_sts_id'], 'integer'],
            [['uuid', 'timeid', 'refno', 'who_name', 'remark', 'upd_date', 'upd_by', 'in_time', 'out_time', 'chk_status', 'cust_name', 'chk_time', 'guid', 'what_name', 'chk_type'], 'safe'],
            [['lat', 'lng', 'cust_lat', 'cust_lng', 'in_lat', 'in_lng', 'out_lat', 'out_lng'], 'number'],
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
        $query = CheckIn::find();

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
            'usrid' => $this->usrid,
            'cust_id' => $this->cust_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'timeid' => $this->timeid,
            'company_id' => $this->company_id,
            'what_id' => $this->what_id,
            'upd_date' => $this->upd_date,
            'in_time' => $this->in_time,
            'out_time' => $this->out_time,
            'cust_type_id' => $this->cust_type_id,
            'cust_lat' => $this->cust_lat,
            'cust_lng' => $this->cust_lng,
            'in_lat' => $this->in_lat,
            'in_lng' => $this->in_lng,
            'out_lat' => $this->out_lat,
            'out_lng' => $this->out_lng,
            'chk_time' => $this->chk_time,
            'cust_sts_id' => $this->cust_sts_id,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'refno', $this->refno])
            ->andFilterWhere(['like', 'who_name', $this->who_name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by])
            ->andFilterWhere(['like', 'chk_status', $this->chk_status])
            ->andFilterWhere(['like', 'cust_name', $this->cust_name])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'what_name', $this->what_name])
            ->andFilterWhere(['like', 'chk_type', $this->chk_type]);

        return $dataProvider;
    }
}
