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
			[['pic_url'], 'string', 'max' => 150],
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
			'upd_date' => Yii::t('cust', 'Upd Date'),
			'upd_by' => Yii::t('cust', 'Upd By'),
			'cr_date' => Yii::t('cust', 'Cr Date'),
			'cr_by' => Yii::t('cust', 'Cr By'),
			'pic_url' => Yii::t('cust', 'Pic Url'),
		];
	}

	public function getCreatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->cr_date, $format);
	}

	public function getUpdatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->upd_date, $format);
	}

	public function getCust() {
		return $this->hasOne(Cust::className(), ['sts_id' => 'id']);
	}
}
