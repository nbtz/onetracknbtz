<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ReportSearch form
 */
class ReportSearchForm extends Model {
	public $bu_id;
	public $usrid;
	public $in_time;
	public $out_time;
	public $cust_name;

	public function rules() {
		return [
			[['cust_name'], 'string'],
			[['in_time', 'out_time'], 'safe'],
			[['bu_id', 'usrid'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'cust_name' => Yii::t('checkin', 'Cust Name'),
			'in_time' => Yii::t('checkin', 'In Time'),
			'out_time' => Yii::t('checkin', 'Out Time'),
			'bu_id' => Yii::t('checkin', 'Team ID'),
			'usrid' => Yii::t('checkin', 'Username'),
		];
	}

}