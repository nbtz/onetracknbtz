<?php
namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *implements IdentityInterface
 */
class User extends ActiveRecord {
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
	public $password_repeat;
	/**
	 * @inheritdoc
	 */
	/*public static function tableName() {
			return 'sp_user';
		}

		public static function getDb() {
			return Yii::$app->get('pgsql');
	*/
	public static function tableName() {
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
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
	public function rules() {
		return [
			// [['id'], 'required'],
			// [['id', 'company_id', 'postion_id', 'org_id', 'user_type_id', 'bu_id'], 'integer'],
			// [['cr_date', 'upd_date', 'active_date', 'expire_date', 'birth_date'], 'safe'],
			// [['username', 'tel_m'], 'string', 'max' => 30],
			// [['fname', 'lname', 'pwd'], 'string', 'max' => 50],
			// [['email', 'pic_url'], 'string', 'max' => 100],
			// [['cr_by', 'upd_by'], 'string', 'max' => 20],
			// [['guid'], 'string', 'max' => 200],
			// [['status', 'users_typecom'], 'string', 'max' => 1],
			// [['tel_code'], 'string', 'max' => 5],

			[['company_id', 'postion_id', 'org_id', 'user_type_id', 'cr_date', 'upd_date', 'active_date', 'expire_date', 'bu_id'], 'integer'],
			// [['username', 'pwd', 'auth_key'], 'required'],

			[['birth_date'], 'safe'],
			[['username', 'pwd', 'fname', 'lname', 'email', 'tel_m', 'pic_url', 'cr_by', 'upd_by', 'guid', 'password_reset_token'], 'string', 'max' => 255],
			[['status', 'users_typecom'], 'string', 'max' => 1],
			[['tel_code'], 'string', 'max' => 10],
			[['auth_key'], 'string', 'max' => 32],
			[['username'], 'unique'],
			[['password_reset_token'], 'unique'],
			// ['password2', 'required'],

			[['pwd', 'password_repeat'], 'string', 'min' => 6],
			['password_repeat', 'compare', 'compareAttribute' => 'pwd'],
		];
	}

	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => 'Company ID',
			'username' => 'Username',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'pwd' => 'Pwd',
			'postion_id' => 'Postion ID',
			'org_id' => 'Org ID',
			'email' => 'Email',
			'tel_m' => 'Tel M',
			'pic_url' => 'Pic Url',
			'user_type_id' => 'User Type ID',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'guid' => 'Guid',
			'status' => 'Status',
			'active_date' => 'Active Date',
			'expire_date' => 'Expire Date',
			'tel_code' => 'Tel Code',
			'birth_date' => 'Birth Date',
			'bu_id' => 'Bu ID',
			'users_typecom' => 'Users Typecom',
			'auth_key' => 'Auth Key',
			'password_reset_token' => 'Password Reset Token',
			'password_repeat' => 'Password Repeat',
		];
	}

}
