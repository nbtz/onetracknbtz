<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_tumbon".
 *
 * @property integer $gid
 * @property string $tambon_e
 * @property string $tambon_t
 * @property string $the_geom
 * @property integer $amphurid
 * @property integer $provinceid
 * @property integer $i_province
 * @property integer $i_amphur
 * @property integer $i_tumbon
 * @property integer $i_code
 * @property string $province_t
 * @property string $province_e
 * @property string $amphur_t
 * @property string $amphur_e
 * @property string $o_province
 * @property string $o_amphur
 * @property string $o_tumbon
 * @property string $n_province
 * @property string $n_amphur
 * @property string $n_tumbon
 * @property string $bbox
 * @property string $lat
 * @property string $lng
 * @property integer $region
 * @property integer $subzone
 * @property integer $slevel
 * @property string $simg
 * @property string $surl
 * @property integer $n_geom
 * @property integer $n_point
 * @property string $nsew
 * @property string $skml
 * @property string $n_xyz
 * @property string $o_xyz
 * @property integer $n_gid
 * @property string $substs
 * @property string $is_geom
 * @property string $is_th
 * @property integer $srctype
 * @property integer $srckey
 * @property string $dtcreate
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_tumbon';
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
            [['gid'], 'required'],
            [['gid', 'amphurid', 'provinceid', 'i_province', 'i_amphur', 'i_tumbon', 'i_code', 'region', 'subzone', 'slevel', 'n_geom', 'n_point', 'n_gid', 'srctype', 'srckey'], 'integer'],
            [['tambon_e', 'tambon_t', 'the_geom', 'province_t', 'province_e', 'amphur_t', 'amphur_e', 'o_province', 'o_amphur', 'o_tumbon', 'n_province', 'n_amphur', 'n_tumbon', 'simg', 'surl', 'nsew', 'skml', 'n_xyz', 'o_xyz'], 'string'],
            [['lat', 'lng'], 'number'],
            [['dtcreate'], 'safe'],
            [['bbox'], 'string', 'max' => 80],
            [['substs', 'is_geom', 'is_th'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'tambon_e' => 'Tambon E',
            'tambon_t' => 'Tambon T',
            'the_geom' => 'The Geom',
            'amphurid' => 'Amphurid',
            'provinceid' => 'Provinceid',
            'i_province' => 'I Province',
            'i_amphur' => 'I Amphur',
            'i_tumbon' => 'I Tumbon',
            'i_code' => 'I Code',
            'province_t' => 'Province T',
            'province_e' => 'Province E',
            'amphur_t' => 'Amphur T',
            'amphur_e' => 'Amphur E',
            'o_province' => 'O Province',
            'o_amphur' => 'O Amphur',
            'o_tumbon' => 'O Tumbon',
            'n_province' => 'N Province',
            'n_amphur' => 'N Amphur',
            'n_tumbon' => 'N Tumbon',
            'bbox' => 'Bbox',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'region' => 'Region',
            'subzone' => 'Subzone',
            'slevel' => 'Slevel',
            'simg' => 'Simg',
            'surl' => 'Surl',
            'n_geom' => 'N Geom',
            'n_point' => 'N Point',
            'nsew' => 'Nsew',
            'skml' => 'Skml',
            'n_xyz' => 'N Xyz',
            'o_xyz' => 'O Xyz',
            'n_gid' => 'N Gid',
            'substs' => 'Substs',
            'is_geom' => 'Is Geom',
            'is_th' => 'Is Th',
            'srctype' => 'Srctype',
            'srckey' => 'Srckey',
            'dtcreate' => 'Dtcreate',
        ];
    }
}
