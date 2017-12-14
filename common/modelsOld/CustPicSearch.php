<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CustPic;

/**
 * CustPicSearch represents the model behind the search form about `common\models\CustPic`.
 */
class CustPicSearch extends CustPic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cust_id', 'usrid', 'company_id', 'pic_size', 'pic_time', 'pic_class_id', 'upd_date'], 'integer'],
            [['guid', 'timeid', 'pic_name', 'pic_filename', 'flag_up', 'temp_path', 'app_code', 'pic_url', 'pic_type', 'upd_by'], 'safe'],
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
        $query = CustPic::find();

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
            'usrid' => $this->usrid,
            'company_id' => $this->company_id,
            'timeid' => $this->timeid,
            'pic_size' => $this->pic_size,
            'pic_time' => $this->pic_time,
            'pic_class_id' => $this->pic_class_id,
            'upd_date' => $this->upd_date,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'pic_name', $this->pic_name])
            ->andFilterWhere(['like', 'pic_filename', $this->pic_filename])
            ->andFilterWhere(['like', 'flag_up', $this->flag_up])
            ->andFilterWhere(['like', 'temp_path', $this->temp_path])
            ->andFilterWhere(['like', 'app_code', $this->app_code])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url])
            ->andFilterWhere(['like', 'pic_type', $this->pic_type])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by]);

        return $dataProvider;
    }
}
