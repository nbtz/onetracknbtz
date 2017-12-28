<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_check_in_pic".
 *
 * @property integer $id
 * @property integer $usrid
 * @property integer $cust_id
 * @property integer $chk_id
 * @property string $guid
 * @property string $pic_name
 * @property string $filename
 * @property string $url
 * @property integer $pic_size
 * @property string $pic_time
 * @property string $pic_type
 * @property string $flag_up
 * @property string $upd_date
 * @property string $upd_by
 * @property string $lat
 * @property string $lng
 * @property string $pic_url
 */
class CheckInPic extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_check_in_pic';
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
			[['usrid', 'cust_id', 'chk_id', 'pic_size'], 'integer'],
			[['pic_time', 'upd_date'], 'safe'],
			[['lat', 'lng'], 'number'],
			[['guid', 'url', 'pic_url'], 'string', 'max' => 100],
			[['pic_name', 'filename'], 'string', 'max' => 50],
			[['pic_type', 'flag_up'], 'string', 'max' => 1],
			[['upd_by'], 'string', 'max' => 20],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'usrid' => 'Usrid',
			'cust_id' => 'Cust ID',
			'chk_id' => 'Chk ID',
			'guid' => 'Guid',
			'pic_name' => 'Pic Name',
			'filename' => 'Filename',
			'url' => 'Url',
			'pic_size' => 'Pic Size',
			'pic_time' => 'Pic Time',
			'pic_type' => 'Pic Type',
			'flag_up' => 'Flag Up',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'pic_url' => 'Pic Url',
		];
	}

	public function getCheckin() {
		return $this->hasOne(CheckIn::className(), ['id' => 'chk_id']);
	}

}
