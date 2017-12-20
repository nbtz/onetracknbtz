<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_period".
 *
 * @property integer $id
 * @property string $pcode
 * @property string $sdate
 * @property string $edate
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $company_id
 */
class Period extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_period';
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
			[['id', 'company_id'], 'integer'],
			[['sdate', 'edate', 'cr_date', 'upd_date'], 'safe'],
			[['pcode', 'cr_by', 'upd_by'], 'string', 'max' => 20],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'pcode' => 'Pcode',
			'sdate' => 'Sdate',
			'edate' => 'Edate',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'company_id' => 'Company ID',
		];
	}
	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}
}
