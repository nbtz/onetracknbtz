<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'postion_id', 'org_id', 'user_type_id', 'bu_id'], 'integer'],
            [['username', 'fname', 'lname', 'pwd', 'email', 'tel_m', 'pic_url', 'cr_date', 'cr_by', 'upd_date', 'upd_by', 'guid', 'status', 'active_date', 'expire_date', 'tel_code', 'birth_date', 'users_typecom'], 'safe'],
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
        $query = User::find();

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
            'postion_id' => $this->postion_id,
            'org_id' => $this->org_id,
            'user_type_id' => $this->user_type_id,
            'cr_date' => $this->cr_date,
            'upd_date' => $this->upd_date,
            'active_date' => $this->active_date,
            'expire_date' => $this->expire_date,
            'birth_date' => $this->birth_date,
            'bu_id' => $this->bu_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'pwd', $this->pwd])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel_m', $this->tel_m])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url])
            ->andFilterWhere(['like', 'cr_by', $this->cr_by])
            ->andFilterWhere(['like', 'upd_by', $this->upd_by])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'tel_code', $this->tel_code])
            ->andFilterWhere(['like', 'users_typecom', $this->users_typecom]);

        return $dataProvider;
    }
}
