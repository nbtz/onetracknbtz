<?php

namespace common\models;

use Yii;

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
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
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

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
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
		];
	}
}
