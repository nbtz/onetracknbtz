<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cust".
 *
 * @property integer $id
 * @property integer $usrid
 * @property string $timeid
 * @property integer $company_id
 * @property string $cust_name
 * @property double $lat
 * @property double $lng
 * @property string $remark
 * @property integer $radius
 * @property double $the_geom
 * @property integer $cust_type_id
 * @property integer $cr_date
 * @property string $cr_by
 * @property string $app_code
 * @property integer $type_id
 * @property string $refno
 * @property integer $sts_id
 * @property integer $upd_date
 * @property string $upd_by
 * @property string $guid
 * @property integer $map_zoom_level
 * @property string $tel_m
 * @property string $admin_level1
 * @property string $admin_level2
 * @property string $email
 * @property integer $admin_level1_id
 * @property integer $admin_level2_id
 * @property integer $last_chk_in
 * @property string $cust_code
 */
class Cust extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'cust';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['usrid', 'company_id', 'radius', 'cust_type_id', 'cr_date', 'type_id', 'sts_id', 'upd_date', 'map_zoom_level', 'admin_level1_id', 'admin_level2_id', 'last_chk_in'], 'integer'],
			[['timeid'], 'safe'],
			[['lat', 'lng', 'the_geom'], 'number'],
			[['email'], 'email'],
			[['tel_m'], 'string', 'max' => 10],
			[['cust_name', 'remark', 'cr_by', 'app_code', 'refno', 'upd_by', 'guid', 'admin_level1', 'admin_level2', 'email', 'cust_code'], 'string', 'max' => 255],
		];
	}

	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'cr_date',
				'updatedAtAttribute' => 'upd_date',
				// 'value' => new Expression('NOW()'),
			],

		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'usrid' => 'Usrid',
			'timeid' => 'Timeid',
			'company_id' => 'Company ID',
			'cust_name' => 'Cust Name',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'remark' => 'Remark',
			'radius' => 'Radius',
			'the_geom' => 'The Geom',
			'cust_type_id' => 'Cust Type ID',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'app_code' => 'App Code',
			'type_id' => 'Type ID',
			'refno' => 'Refno',
			'sts_id' => 'Sts ID',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'guid' => 'Guid',
			'map_zoom_level' => 'Map Zoom Level',
			'tel_m' => 'Tel M',
			'admin_level1' => 'Admin Level1',
			'admin_level2' => 'Admin Level2',
			'email' => 'Email',
			'admin_level1_id' => 'Admin Level1 ID',
			'admin_level2_id' => 'Admin Level2 ID',
			'last_chk_in' => 'Last Chk In',
			'cust_code' => 'Cust Code',
			'createdAtWithFormat' => 'Create Date',
			'updatedAtWithFormat' => 'Update Date',
		];
	}

	public function getCreatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->cr_date, $format);
	}

	public function getUpdatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->upd_date, $format);
	}
}
