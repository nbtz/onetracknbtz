<?php

namespace common\models;

use common\models\Cust;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CustSearch represents the model behind the search form about `common\models\Cust`.
 */
class CustSearch extends Cust {
	// public $custType;
	// public $custStatus;
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id', 'usrid', 'company_id', 'radius', 'cust_type_id', 'type_id', 'sts_id', 'map_zoom_level', 'admin_level1_id', 'admin_level2_id'], 'integer'],
			[['timeid', 'cust_name', 'remark', 'the_geom', 'cr_date', 'cr_by', 'app_code', 'refno', 'upd_date', 'upd_by', 'guid', 'tel_m', 'admin_level1', 'admin_level2', 'email', 'last_chk_in', 'cust_code'], 'safe'],
			[['lat', 'lng'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
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
	public function search($params) {
		$query = Cust::find();

		// $query->joinWith(['custStatus', 'custType']);

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
			'timeid' => $this->timeid,
			'company_id' => $this->company_id,
			'lat' => $this->lat,
			'lng' => $this->lng,
			'radius' => $this->radius,
			'cust_type_id' => $this->cust_type_id,
			'cr_date' => $this->cr_date,
			// 'type_id' => $this->type_id,
			// 'sts_id' => $this->sts_id,
			'upd_date' => $this->upd_date,
			'map_zoom_level' => $this->map_zoom_level,
			'admin_level1_id' => $this->admin_level1_id,
			'admin_level2_id' => $this->admin_level2_id,
			'last_chk_in' => $this->last_chk_in,
		]);

		$query->andFilterWhere(['like', 'cust_name', $this->cust_name])
			->andFilterWhere(['like', 'remark', $this->remark])
			->andFilterWhere(['like', 'the_geom', $this->the_geom])
			->andFilterWhere(['like', 'cr_by', $this->cr_by])
			->andFilterWhere(['like', 'app_code', $this->app_code])
			->andFilterWhere(['like', 'refno', $this->refno])
			->andFilterWhere(['like', 'upd_by', $this->upd_by])
			->andFilterWhere(['like', 'guid', $this->guid])
			->andFilterWhere(['like', 'tel_m', $this->tel_m])
			->andFilterWhere(['like', 'admin_level1', $this->admin_level1])
			->andFilterWhere(['like', 'admin_level2', $this->admin_level2])
			->andFilterWhere(['like', 'email', $this->email])
		// ->andFilterWhere(['like', 'custStatus.sts_name', $this->custStatus])
		// ->andFilterWhere(['like', 'custType.type_name', $this->custType])
			->andFilterWhere(['like', 'cust_code', $this->cust_code]);

		return $dataProvider;
	}
}
