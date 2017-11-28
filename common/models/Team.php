<?php

namespace common\models;

use Yii;
use \yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property integer $upd_date
 * @property string $upd_by
 * @property integer $cr_date
 * @property string $cr_by
 */
class Team extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'team';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['upd_date', 'cr_date'], 'integer'],
			[['name', 'upd_by', 'cr_by'], 'string', 'max' => 255],
		];
	}

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
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'name' => 'Name',
			'upd_date' => 'Update Date',
			'upd_by' => 'Upd By',
			'cr_date' => 'Create Date',
			'cr_by' => 'Cr By',
			'createdAtWithFormat' => 'Create Date',
			'updatedAtWithFormat' => 'Update Date',
		];
	}

	public function getCreatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->cr_date, $format);
	}

	public function getUpdatedAtWithFormat($format = "medium") {
		return \Yii::$app->formatter->asDatetime($this->upd_date, $format);
	}
}
