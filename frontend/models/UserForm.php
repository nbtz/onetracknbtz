<?php
namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Signup form
 */
class UserForm extends Model {

	public $password_repeat;
	public $id;
	public $company_id;
	public $username;
	public $fname;
	public $lname;
	public $pwd;
	public $postion_id;
	public $org_id;
	public $email;
	public $tel_m;
	public $pic_url;
	public $user_type_id;
	public $cr_date;
	public $cr_by;
	public $upd_date;
	public $upd_by;
	public $guid;
	public $status;
	public $active_date;
	public $expire_date;
	public $tel_code;
	public $birth_date;
	public $bu_id;
	public $users_typecom;
	public $auth_key;
	public $imageFile;

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['username', 'email', 'tel_code', 'tel_m', 'fname', 'lname', 'pwd', 'password_repeat'], 'required'],
			['username', 'trim'],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 30],

			['email', 'trim'],
			['email', 'email'],
			[['email'], 'string', 'max' => 100],
			[['pic_url'], 'string'],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

			[['pwd', 'password_repeat'], 'string', 'min' => 6, 'max' => 50],
			['password_repeat', 'compare', 'compareAttribute' => 'pwd'],

			[['fname', 'lname', 'auth_key'], 'string', 'max' => 50],
			[['tel_code'], 'string', 'max' => 5],
			[['id', 'company_id', 'postion_id', 'org_id', 'user_type_id', 'bu_id'], 'integer'],
			[['cr_by', 'upd_by'], 'string', 'max' => 20],
			[['status', 'users_typecom'], 'string', 'max' => 1],
			[['guid'], 'string', 'max' => 200],
			[['imageFile'], 'file', 'extensions' => 'png, jpg'], //'skipOnEmpty' => false,

		];
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

	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => Yii::t('user', 'Company ID'),
			'username' => Yii::t('user', 'Username'),
			'fname' => Yii::t('user', 'Fname'),
			'lname' => Yii::t('user', 'Lname'),
			'pwd' => Yii::t('user', 'Pwd'),
			'postion_id' => Yii::t('user', 'Postion ID'),
			'org_id' => Yii::t('user', 'Org ID'),
			'email' => Yii::t('user', 'Email'),
			'tel_m' => Yii::t('user', 'Tel M'),
			'pic_url' => Yii::t('user', 'Pic Url'),
			'user_type_id' => Yii::t('user', 'User Type ID'),
			'cr_date' => Yii::t('main', 'Cr Date'),
			'cr_by' => Yii::t('main', 'Cr By'),
			'upd_date' => Yii::t('main', 'Upd Date'),
			'upd_by' => Yii::t('main', 'Upd By'),
			'guid' => Yii::t('user', 'Guid'),
			'status' => Yii::t('user', 'Status'),
			'active_date' => Yii::t('user', 'Active Date'),
			'expire_date' => Yii::t('user', 'Expire Date'),
			'tel_code' => Yii::t('user', 'Tel Code'),
			'birth_date' => Yii::t('user', 'Birth Date'),
			'bu_id' => Yii::t('user', 'Bu ID'),
			'users_typecom' => Yii::t('user', 'Users Typecom'),
			'password_repeat' => Yii::t('user', 'Password Repeat'),
			'imageFile' => Yii::t('cust', 'Pic Url'),

		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup() {
		Yii::info('signup()');
		if (!$this->validate()) {
			// Yii::info($this->validate());
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->pwd);
		$user->generateAuthKey();

		$user->fname = $this->fname;
		$user->lname = $this->lname;
		$user->tel_m = $this->tel_m;
		$user->tel_code = $this->tel_code;
		$user->bu_id = $this->bu_id;
		$user->postion_id = $this->postion_id;
		$user->pic_url = $this->pic_url;
		$user->company_id = $this->company_id;
		// $user->birth_date = $this->birth_date;
		$user->birth_date = date("Y-m-d");
		// $user->status = "P";
		if (empty($this->user)) {
			$user->status = "P";
		} else {
			$user->status = $this->status;
		}

		$user->guid = "USR-" . $user->authKey;
		$user->cr_by = $this->cr_by;
		$user->upd_by = $this->upd_by;

		if ($user->save()) {
			Yii::info('user->save');
			return $user;
		} else {
			Yii::info('user not save');
			Yii::info('error');
			Yii::info($user->errors);
			return null;
		}

	}

	public function getPartImage($filename) {
		if (isset($filename) && !empty($filename)) {
			$pic_url = 'https://s3-ap-southeast-1.amazonaws.com/onetrack-checkin/images/' . $filename;
			return $pic_url;
		}

		return '@web/images/default-empty.jpg';
	}
}
