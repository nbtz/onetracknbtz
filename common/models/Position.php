<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_position".
 *
 * @property integer $id
 * @property string $postion_name
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $company_id
 * @property string $status
 */
class Position extends \yii\db\ActiveRecord {
	const STATUS_DELETED = 0; // แบน
	const STATUS_ACTIVE = 1; //
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_position';
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
			[['postion_name', 'status'], 'required'],
			[['id', 'company_id'], 'integer'],
			[['upd_date'], 'safe'],
			[['postion_name'], 'string', 'max' => 100],
			[['upd_by'], 'string', 'max' => 20],
			[['status'], 'string', 'max' => 1],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'postion_name' => Yii::t('position', 'Postion Name'),
			'upd_date' => Yii::t('main', 'Upd Date'),
			'upd_by' => Yii::t('main', 'Upd By'),
			'company_id' => Yii::t('position', 'Company ID'),
			'status' => Yii::t('position', 'Status'),
			'nameStatus' => Yii::t('position', 'Status'),
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

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getNameStatus() {
		if ($this->status == Self::STATUS_ACTIVE) {
			return Yii::t('position', 'Active');
		} else {
			return Yii::t('position', 'Banned');
		}
	}
}
