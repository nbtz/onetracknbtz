<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_tbu_plan".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $bu_id
 * @property integer $usrid
 * @property integer $kind
 * @property string $pcode
 * @property string $sdate
 * @property string $edate
 * @property integer $new_member
 * @property integer $checkin
 * @property string $upd_date
 * @property string $upd_by
 * @property string $stime
 * @property string $etime
 */
class TbuPlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_tbu_plan';
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
            [['id', 'company_id', 'bu_id', 'usrid', 'kind', 'new_member', 'checkin'], 'integer'],
            [['sdate', 'edate', 'upd_date', 'stime', 'etime'], 'safe'],
            [['pcode'], 'string', 'max' => 10],
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
            'company_id' => 'Company ID',
            'bu_id' => 'Bu ID',
            'usrid' => 'Usrid',
            'kind' => 'Kind',
            'pcode' => 'Pcode',
            'sdate' => 'Sdate',
            'edate' => 'Edate',
            'new_member' => 'New Member',
            'checkin' => 'Checkin',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'stime' => 'Stime',
            'etime' => 'Etime',
        ];
    }
}
