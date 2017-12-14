<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_check_in".
 *
 * @property integer $id
 * @property string $uuid
 * @property integer $usrid
 * @property integer $cust_id
 * @property string $lat
 * @property string $lng
 * @property string $timeid
 * @property string $refno
 * @property integer $company_id
 * @property integer $what_id
 * @property string $who_name
 * @property string $remark
 * @property string $upd_date
 * @property string $upd_by
 * @property string $in_time
 * @property string $out_time
 * @property integer $cust_type_id
 * @property string $chk_status
 * @property string $cust_name
 * @property string $cust_lat
 * @property string $cust_lng
 * @property string $in_lat
 * @property string $in_lng
 * @property string $out_lat
 * @property string $out_lng
 * @property string $chk_time
 * @property string $guid
 * @property string $what_name
 * @property string $chk_type
 * @property integer $cust_sts_id
 */
class CheckIn extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_check_in';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
	}

	public static function primaryKey() {
		return ['id'];
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['usrid', 'cust_id', 'company_id', 'what_id', 'cust_type_id', 'cust_sts_id'], 'integer'],
			[['lat', 'lng', 'cust_lat', 'cust_lng', 'in_lat', 'in_lng', 'out_lat', 'out_lng'], 'number'],
			[['timeid', 'upd_date', 'in_time', 'out_time', 'chk_time'], 'safe'],
			[['uuid', 'who_name', 'cust_name', 'guid', 'what_name'], 'string', 'max' => 100],
			[['refno', 'upd_by'], 'string', 'max' => 20],
			[['remark'], 'string', 'max' => 400],
			[['chk_status', 'chk_type'], 'string', 'max' => 1],
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
			'lat' => 'Lat',
			'lng' => 'Lng',
			'timeid' => 'Timeid',
			'refno' => 'Refno',
			'company_id' => 'Company ID',
			'what_id' => 'What ID',
			'who_name' => 'Who Name',
			'remark' => 'Remark',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'in_time' => 'In Time',
			'out_time' => 'Out Time',
			'cust_type_id' => 'Cust Type ID',
			'chk_status' => 'Chk Status',
			'cust_name' => 'Cust Name',
			'cust_lat' => 'Cust Lat',
			'cust_lng' => 'Cust Lng',
			'in_lat' => 'In Lat',
			'in_lng' => 'In Lng',
			'out_lat' => 'Out Lat',
			'out_lng' => 'Out Lng',
			'chk_time' => 'Chk Time',
			'guid' => 'Guid',
			'what_name' => 'What Name',
			'chk_type' => 'Chk Type',
			'cust_sts_id' => 'Cust Sts ID',
		];
	}
}
