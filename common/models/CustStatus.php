<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cust_status".
 *
 * @property integer $id
 * @property string $code
 * @property string $sts_name
 * @property integer $company_id
 * @property integer $upd_date
 * @property string $upd_by
 * @property integer $cr_date
 * @property string $cr_by
 * @property string $pic_url
 */
class CustStatus extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'cust_status';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['company_id', 'upd_date', 'cr_date'], 'integer'],
			[['code', 'sts_name', 'upd_by', 'cr_by', 'pic_url'], 'string', 'max' => 255],
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
			'code' => 'Code',
			'sts_name' => 'Sts Name',
			'company_id' => 'Company ID',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'pic_url' => 'Pic Url',
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
