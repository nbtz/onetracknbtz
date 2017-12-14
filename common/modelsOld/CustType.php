<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cust_type".
 *
 * @property integer $id
 * @property string $type_code
 * @property string $type_name
 * @property integer $company_id
 * @property integer $upd_date
 * @property string $upd_by
 * @property integer $cr_date
 * @property string $cr_by
 * @property string $pic_url
 */
class CustType extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'cust_type';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['company_id', 'upd_date', 'cr_date'], 'integer'],
			[['type_code', 'type_name', 'upd_by', 'cr_by', 'pic_url'], 'string', 'max' => 255],
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
			'type_code' => Yii::t('cust', 'Type Code'),
			'type_name' => Yii::t('cust', 'Type Name'),
			'company_id' => 'Company ID',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'pic_url' => 'Pic Url',
			'createdAtWithFormat' => Yii::t('main', 'Create Date'),
			'updatedAtWithFormat' => Yii::t('main', 'Update Date'),
		];
	}

	public function getCreatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->cr_date, $format);
	}

	public function getUpdatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->upd_date, $format);
	}

	public function getCust() {
		return $this->hasOne(Cust::className(), ['cust_type_id' => 'id']);
	}
}
