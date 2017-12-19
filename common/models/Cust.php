<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_cust".
 *
 * @property integer $id
 * @property integer $usrid
 * @property string $timeid
 * @property integer $company_id
 * @property string $cust_name
 * @property string $lat
 * @property string $lng
 * @property string $remark
 * @property integer $radius
 * @property string $the_geom
 * @property integer $cust_type_id
 * @property string $cr_date
 * @property string $cr_by
 * @property string $app_code
 * @property integer $type_id
 * @property string $refno
 * @property integer $sts_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $guid
 * @property integer $map_zoom_level
 * @property string $tel_m
 * @property string $admin_level1
 * @property string $admin_level2
 * @property string $email
 * @property integer $admin_level1_id
 * @property integer $admin_level2_id
 * @property string $last_chk_in
 * @property string $cust_code
 */
class Cust extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_cust';
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
				'createdAtAttribute' => 'cr_date',
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
			// 'cust_code'
			[['cust_name', 'cust_type_id', 'sts_id', 'email', 'tel_m'], 'required'],
			[['usrid', 'company_id', 'radius', 'cust_type_id', 'type_id', 'sts_id', 'map_zoom_level', 'admin_level1_id', 'admin_level2_id'], 'integer'],
			[['timeid', 'cr_date', 'upd_date', 'last_chk_in'], 'safe'],
			[['lat', 'lng'], 'number'],
			[['the_geom'], 'string'],
			[['cust_name', 'remark', 'app_code', 'guid', 'admin_level1', 'admin_level2'], 'string', 'max' => 100],
			[['cr_by', 'refno', 'upd_by'], 'string', 'max' => 20],
			[['tel_m'], 'string', 'max' => 30],
			[['email'], 'string', 'max' => 50],
			[['cust_code'], 'string', 'max' => 10],
			[['email'], 'email'],
			[['tel_m'], 'match', 'pattern' => '/^0[1-9]([0-9]\d*|\d)$/', 'message' => 'อักษรที่อนุญาตคือตัวเลขเท่านั้น และขึ้นต้นด้วย 0'],
			[['imageFile'], 'file', 'extensions' => 'png, jpg'], //'skipOnEmpty' => false,
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'usrid' => Yii::t('cust', 'Usrid'),
			'timeid' => Yii::t('cust', 'Timeid'),
			'company_id' => Yii::t('cust', 'Company ID'),
			'cust_name' => Yii::t('cust', 'Cust Name'),
			'lat' => Yii::t('cust', 'Lat'),
			'lng' => Yii::t('cust', 'Lng'),
			'remark' => Yii::t('cust', 'Remark'),
			'radius' => Yii::t('cust', 'Radius'),
			'the_geom' => Yii::t('cust', 'The Geom'),
			'cust_type_id' => Yii::t('cust', 'Cust Type ID'),
			'cr_date' => Yii::t('main', 'Cr Date'),
			'cr_by' => Yii::t('main', 'Cr By'),
			'app_code' => Yii::t('cust', 'App Code'),
			'type_id' => Yii::t('cust', 'Type ID'),
			'refno' => Yii::t('cust', 'Refno'),
			'sts_id' => Yii::t('cust', 'Sts ID'),
			'upd_date' => Yii::t('main', 'Upd Date'),
			'upd_by' => Yii::t('main', 'Upd By'),
			'guid' => Yii::t('cust', 'Guid'),
			'map_zoom_level' => Yii::t('cust', 'Map Zoom Level'),
			'tel_m' => Yii::t('cust', 'Tel M'),
			'admin_level1' => Yii::t('cust', 'Admin Level1'),
			'admin_level2' => Yii::t('cust', 'Admin Level2'),
			'email' => Yii::t('cust', 'Email'),
			'admin_level1_id' => Yii::t('cust', 'Admin Level1 ID'),
			'admin_level2_id' => Yii::t('cust', 'Admin Level2 ID'),
			'last_chk_in' => Yii::t('cust', 'Last Chk In'),
			'cust_code' => Yii::t('cust', 'Cust Code'),
			'createdAtWithFormat' => Yii::t('main', 'Create Date'),
			'updatedAtWithFormat' => Yii::t('main', 'Update Date'),

		];
	}

	/*
		public function getCreatedAtWithFormat($format = "medium") {
			return \Yii::$app->formatter->asDatetime($this->cr_date, $format);
		}

		public function getUpdatedAtWithFormat($format = "medium") {
			return \Yii::$app->formatter->asDatetime($this->upd_date, $format);
		}
	*/

	public function getCreatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->cr_date));
	}

	public function getUpdatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->upd_date));
	}

	public function getCustType() {
		return $this->hasOne(CustType::className(), ['id' => 'cust_type_id']);
	}

	public function getCustStatus() {
		return $this->hasOne(CustStatus::className(), ['id' => 'sts_id']);
	}

	public function getCustPic() {
		return $this->hasOne(CustPic::className(), ['id' => 'cust_id']);
	}

	public function getUrlDisplay() {
		#https://s3-ap-southeast-1.amazonaws.com/onetrack-checkin/<filename>
		if (isset($this->getcustPic()->pic_filename) && !empty($this->getcustPic()->pic_filename)) {
			$pic_url = 'https://s3-ap-southeast-1.amazonaws.com/onetrack-checkin/' . $this->pic_filename;
			return $pic_url;
		}

		return '@web/images/default-empty.jpg';
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}
}
