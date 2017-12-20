<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Code form
 */
class CodeForm extends Model {
	public $code;

	public function rules() {
		return [
			[['code'], 'required'],
			[['code'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'code' => Yii::t('company', 'Code Company'),
		];
	}

}