<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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

	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'upd_date',
				'updatedAtAttribute' => 'upd_date',
				'value' => new Expression('NOW()'),
			],

		];
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
			'uuid' => Yii::t('checkin', 'Uuid'),
			'usrid' => Yii::t('checkin', 'Usrid'),
			'cust_id' => Yii::t('checkin', 'Cust ID'),
			'lat' => Yii::t('checkin', 'Lat'),
			'lng' => Yii::t('checkin', 'Lng'),
			'timeid' => Yii::t('checkin', 'Timeid'),
			'refno' => Yii::t('checkin', 'Refno'),
			'company_id' => Yii::t('checkin', 'Company ID'),
			'what_id' => Yii::t('checkin', 'What ID'),
			'who_name' => Yii::t('checkin', 'Who Name'),
			'remark' => Yii::t('checkin', 'Remark'),
			'upd_date' => Yii::t('main', 'Upd Date'),
			'upd_by' => Yii::t('main', 'Upd By'),
			'in_time' => Yii::t('checkin', 'In Time'),
			'out_time' => Yii::t('checkin', 'Out Time'),
			'cust_type_id' => Yii::t('checkin', 'Cust Type ID'),
			'chk_status' => Yii::t('checkin', 'Chk Status'),
			'cust_name' => Yii::t('checkin', 'Cust Name'),
			'cust_lat' => Yii::t('checkin', 'Cust Lat'),
			'cust_lng' => Yii::t('checkin', 'Cust Lng'),
			'in_lat' => Yii::t('checkin', 'In Lat'),
			'in_lng' => Yii::t('checkin', 'In Lng'),
			'out_lat' => Yii::t('checkin', 'Out Lat'),
			'out_lng' => Yii::t('checkin', 'Out Lng'),
			'chk_time' => Yii::t('checkin', 'Chk Time'),
			'guid' => Yii::t('checkin', 'Guid'),
			'what_name' => Yii::t('checkin', 'What Name'),
			'chk_type' => Yii::t('checkin', 'Chk Type'),
			'cust_sts_id' => Yii::t('checkin', 'Cust Sts ID'),
		];
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getUpdatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->upd_date));
	}

	public function getUser() {
		return $this->hasOne(User::className(), ['id' => 'usrid']);
	}
	public function getCust() {
		return $this->hasOne(Cust::className(), ['id' => 'cust_id']);
	}
	public function getCustType() {
		return $this->hasOne(CustType::className(), ['id' => 'cust_type_id']);
	}

	public function getCustStatus() {
		return $this->hasOne(CustStatus::className(), ['id' => 'cust_sts_id']);
	}

	public function getPic() {
		return $this->hasOne(CheckInPic::className(), ['chk_id' => 'id']);
	}
}
