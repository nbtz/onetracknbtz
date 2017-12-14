<?php

namespace common\models;

use Yii;

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
			[['company_id'], 'required'],
			[['company_id'], 'integer'],
			[['upd_date', 'cr_date'], 'safe'],
			[['code', 'upd_by'], 'string', 'max' => 10],
			[['sts_name'], 'string', 'max' => 100],
			[['cr_by'], 'string', 'max' => 20],
			[['pic_url'], 'string', 'max' => 150],
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
		];
	}
}
