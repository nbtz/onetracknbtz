<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_cust_status".
 *
 * @property integer $id
 * @property string $code
 * @property string $sts_name
 * @property integer $company_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $cr_date
 * @property string $cr_by
 * @property string $pic_url
 */
class CustStatus extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public $imageFile;

	public static function tableName() {
		return 'sp_cust_status';
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
			// [['company_id'], 'required'],
			[['code', 'sts_name'], 'required'],
			[['company_id'], 'integer'],
			[['upd_date', 'cr_date'], 'safe'],
			[['code', 'upd_by'], 'string', 'max' => 10],
			[['sts_name'], 'string', 'max' => 100],
			[['cr_by'], 'string', 'max' => 20],
			[['pic_url'], 'string'],
			[['imageFile'], 'file', 'extensions' => 'png, jpg'], //'skipOnEmpty' => false,

		];
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
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'code' => Yii::t('cust', 'Code'),
			'sts_name' => Yii::t('cust', 'Sts Name'),
			'company_id' => Yii::t('cust', 'Company ID'),
			'upd_date' => Yii::t('main', 'Upd Date'),
			'upd_by' => Yii::t('main', 'Upd By'),
			'cr_date' => Yii::t('main', 'Cr Date'),
			'cr_by' => Yii::t('main', 'Cr By'),
			'pic_url' => Yii::t('cust', 'Pic Url'),
			'createdAtWithFormat' => Yii::t('main', 'Create Date'),
			'updatedAtWithFormat' => Yii::t('main', 'Update Date'),
			'imageFile' => Yii::t('cust', 'Pic Url'),

		];
	}

	public function getCreatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->cr_date));
	}

	public function getUpdatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->upd_date));
	}

	public function getCust() {
		return $this->hasOne(Cust::className(), ['sts_id' => 'id']);
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getPartImage($filename) {
		if (isset($filename) && !empty($filename)) {
			$pic_url = 'https://s3-ap-southeast-1.amazonaws.com/onetrack-checkin/images/' . $filename;
			return $pic_url;
		}

		return '@web/images/default-empty.jpg';
	}
}
