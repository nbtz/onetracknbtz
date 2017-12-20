<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_check_in_plan".
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $usrid
 * @property integer $cust_id
 * @property string $timeid
 * @property integer $company_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $cr_date
 * @property string $cr_by
 * @property string $status
 * @property integer $ref_check_in_id
 * @property string $plan_time
 * @property string $chk_status
 */
class CheckInPlan extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_check_in_plan';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['usrid', 'cust_id', 'company_id', 'ref_check_in_id'], 'integer'],
			[['timeid', 'upd_date', 'cr_date', 'plan_time'], 'safe'],
			[['uuid'], 'string', 'max' => 100],
			[['upd_by', 'cr_by'], 'string', 'max' => 20],
			[['status', 'chk_status'], 'string', 'max' => 1],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'uuid' => 'Uuid',
			'usrid' => 'Usrid',
			'cust_id' => 'Cust ID',
			'timeid' => 'Timeid',
			'company_id' => 'Company ID',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'status' => 'Status',
			'ref_check_in_id' => 'Ref Check In ID',
			'plan_time' => 'Plan Time',
			'chk_status' => 'Chk Status',
		];
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}
}
