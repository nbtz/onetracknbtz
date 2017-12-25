<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_cust_pic".
 *
 * @property string $guid
 * @property integer $cust_id
 * @property integer $usrid
 * @property integer $company_id
 * @property string $timeid
 * @property string $pic_name
 * @property integer $pic_size
 * @property string $pic_filename
 * @property string $flag_up
 * @property string $temp_path
 * @property string $app_code
 * @property string $pic_url
 * @property string $pic_time
 * @property string $pic_type
 * @property integer $pic_class_id
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $id
 */
class CustPic extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_cust_pic';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
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
			[['cust_id', 'usrid', 'company_id', 'pic_size', 'pic_class_id'], 'integer'],
			[['timeid', 'pic_time', 'upd_date'], 'safe'],
			[['guid', 'temp_path', 'pic_url'], 'string', 'max' => 100],
			[['pic_name', 'app_code'], 'string', 'max' => 50],
			[['pic_filename'], 'string', 'max' => 150],
			[['flag_up'], 'string', 'max' => 1],
			[['pic_type'], 'string', 'max' => 5],
			[['upd_by'], 'string', 'max' => 20],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'guid' => 'Guid',
			'cust_id' => 'Cust ID',
			'usrid' => 'Usrid',
			'company_id' => 'Company ID',
			'timeid' => 'Timeid',
			'pic_name' => 'Pic Name',
			'pic_size' => 'Pic Size',
			'pic_filename' => 'Pic Filename',
			'flag_up' => 'Flag Up',
			'temp_path' => 'Temp Path',
			'app_code' => 'App Code',
			'pic_url' => 'Pic Url',
			'pic_time' => 'Pic Time',
			'pic_type' => 'Pic Type',
			'pic_class_id' => 'Pic Class ID',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'id' => 'ID',
		];
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getCust() {
		return $this->hasOne(Cust::className(), ['id' => 'cust_id']);
	}
}
