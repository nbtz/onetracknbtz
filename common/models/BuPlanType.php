<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_bu_plan_type".
 *
 * @property integer $id
 * @property string $kind_name
 * @property string $kind_name_en
 * @property string $upd_date
 * @property string $upd_by
 */
class BuPlanType extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_bu_plan_type';
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
			[['id'], 'required'],
			[['id'], 'integer'],
			[['upd_date'], 'safe'],
			[['kind_name', 'kind_name_en', 'upd_by'], 'string', 'max' => 100],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'kind_name' => 'Kind Name',
			'kind_name_en' => 'Kind Name En',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
		];
	}
}
