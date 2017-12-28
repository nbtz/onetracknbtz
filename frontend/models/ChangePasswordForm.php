<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Password reset form
 */
class ChangePasswordForm extends Model {
	public $password;
	public $password_repeat;
	public $password_old;
	public $upd_by;
	public $upd_date;
	public $cr_date;

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

	public function rules() {
		return [
			[['password', 'password_old', 'password_repeat'], 'required'],
			[['password', 'password_old', 'password_repeat'], 'string', 'min' => 4, 'max' => 50],
			['password_repeat', 'compare', 'compareAttribute' => 'password'],
		];
	}

	public function attributeLabels() {
		return [
			'id' => 'ID',
			'password' => Yii::t('user', 'Pwd'),
			'password_repeat' => Yii::t('user', 'Password Repeat'),
			'password_old' => Yii::t('user', 'Password Old'),
		];
	}

	/*public function checkDatePassword($attribute, $params)
		    {
		        if(md($this->$attribute) == $this->pwd){
		            $this->addError($attribute, Yii::t('product','choose end_date again'));
		        }
	*/

	public function resetPassword() {
		if (!$this->validate()) {
			// Yii::info($this->validate());
			return null;
		}
		$user = Yii::$app->user->identity;
		$user->upd_by = Yii::$app->user->identity->username;

		$inputpwd = md5($this->password_old);
		if ($inputpwd == Yii::$app->user->identity->pwd) {
			$user->setPassword($this->password);
			return $user->save();
		} else {

			return null;
		}
	}

}