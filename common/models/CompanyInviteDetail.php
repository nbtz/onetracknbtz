<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_company_invite_detail".
 *
 * @property integer $invite_id
 * @property integer $usrid
 * @property string $upd_date
 * @property string $upd_by
 * @property string $invite_code
 * @property string $uuid
 */
class CompanyInviteDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_company_invite_detail';
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
            [['invite_id', 'usrid'], 'integer'],
            [['upd_date'], 'safe'],
            [['upd_by', 'uuid'], 'string', 'max' => 20],
            [['invite_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'invite_id' => 'Invite ID',
            'usrid' => 'Usrid',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'invite_code' => 'Invite Code',
            'uuid' => 'Uuid',
        ];
    }
}
