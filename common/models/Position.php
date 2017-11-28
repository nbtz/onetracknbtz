<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_position".
 *
 * @property integer $id
 * @property string $postion_name
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $company_id
 * @property string $status
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_position';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('pgsql');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id'], 'integer'],
            [['upd_date'], 'safe'],
            [['postion_name'], 'string', 'max' => 100],
            [['upd_by'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postion_name' => 'Postion Name',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'company_id' => 'Company ID',
            'status' => 'Status',
        ];
    }
}
