<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_company".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $company_name
 * @property string $address
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 * @property string $status
 * @property string $guid
 * @property integer $org_id
 * @property string $customer_code
 * @property integer $tax_id
 * @property integer $company_type
 * @property string $country_code
 * @property string $contact_name
 * @property integer $province
 * @property integer $district
 * @property integer $postal_code
 * @property integer $fax
 * @property integer $phone_number
 * @property string $website
 */
class Company extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_company';
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
			[['id', 'company_id', 'org_id', 'tax_id', 'company_type', 'province', 'district', 'postal_code', 'fax', 'phone_number'], 'integer'],
			[['cr_date', 'upd_date'], 'safe'],
			[['company_name', 'cr_by', 'upd_by'], 'string', 'max' => 20],
			[['address'], 'string', 'max' => 400],
			[['status'], 'string', 'max' => 1],
			[['guid'], 'string', 'max' => 200],
			[['customer_code', 'website'], 'string', 'max' => 100],
			[['country_code'], 'string', 'max' => 10],
			[['contact_name'], 'string', 'max' => 50],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => 'Company ID',
			'company_name' => 'Company Name',
			'address' => 'Address',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'status' => 'Status',
			'guid' => 'Guid',
			'org_id' => 'Org ID',
			'customer_code' => 'Customer Code',
			'tax_id' => 'Tax ID',
			'company_type' => 'Company Type',
			'country_code' => 'Country Code',
			'contact_name' => 'Contact Name',
			'province' => 'Province',
			'district' => 'District',
			'postal_code' => 'Postal Code',
			'fax' => 'Fax',
			'phone_number' => 'Phone Number',
			'website' => 'Website',
		];
	}
}
