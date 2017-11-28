<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_bu".
 *
 * @property integer $id
 * @property string $bu_name
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $company_id
 */
class Bu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_bu';
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
            [['id'], 'required'],
            [['id', 'company_id'], 'integer'],
            [['upd_date'], 'safe'],
            [['bu_name'], 'string', 'max' => 100],
            [['upd_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bu_name' => 'Bu Name',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'company_id' => 'Company ID',
        ];
    }
}