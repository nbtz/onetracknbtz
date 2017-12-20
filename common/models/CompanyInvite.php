<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_company_invite".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $invite_code
 * @property string $status
 * @property string $expire_date
 * @property integer $max_unit
 * @property integer $current_unit
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 */
class CompanyInvite extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_company_invite';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['company_id', 'max_unit', 'current_unit'], 'integer'],
			[['expire_date', 'cr_date', 'upd_date'], 'safe'],
			[['invite_code'], 'string', 'max' => 10],
			[['status'], 'string', 'max' => 1],
			[['cr_by', 'upd_by'], 'string', 'max' => 20],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => 'Company ID',
			'invite_code' => 'Invite Code',
			'status' => 'Status',
			'expire_date' => 'Expire Date',
			'max_unit' => 'Max Unit',
			'current_unit' => 'Current Unit',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
		];
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}
}
