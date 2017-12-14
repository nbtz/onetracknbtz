<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mobileunitdata".
 *
 * @property integer $mobileunitid
 * @property string $uuid
 * @property integer $latitude
 * @property integer $longitude
 * @property integer $speed
 * @property integer $course
 * @property string $gprsdate
 * @property string $gpsdate
 * @property integer $input
 * @property integer $output
 * @property string $emergency
 * @property string $acc
 * @property integer $temp
 * @property integer $tambon
 * @property integer $province
 * @property integer $amphur
 * @property boolean $gps_status
 * @property integer $trip
 * @property integer $analog2
 * @property string $inoutdate
 * @property string $accdate
 * @property integer $stationid
 * @property boolean $in_service
 * @property integer $port
 * @property string $last_reset
 * @property integer $phone_number
 * @property string $last_gid_process
 * @property string $last_acc_off
 * @property string $last_opened
 * @property integer $server_ip
 * @property string $kmx
 * @property integer $poi
 * @property integer $rpm
 * @property integer $refno
 * @property string $xbin
 * @property integer $schild
 * @property integer $seqno
 * @property integer $service_id
 * @property integer $in_station
 * @property integer $out_station
 * @property string $in_station_time
 * @property string $out_station_time
 * @property string $batt
 * @property integer $ram_avl
 * @property string $ram_total
 * @property string $disk_ext_avl
 * @property string $disk_ext_total
 * @property string $disk_avl
 * @property string $disk_total
 * @property integer $sat
 * @property string $accuracy
 * @property string $alt
 * @property string $bearing
 * @property string $src_type
 * @property string $address
 * @property string $imei
 * @property string $lat
 * @property string $lng
 */
class Mobileunitdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mobileunitdata';
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
            [['mobileunitid'], 'required'],
            [['mobileunitid', 'latitude', 'longitude', 'speed', 'course', 'input', 'output', 'temp', 'tambon', 'province', 'amphur', 'trip', 'analog2', 'stationid', 'port', 'phone_number', 'server_ip', 'poi', 'rpm', 'refno', 'schild', 'seqno', 'service_id', 'in_station', 'out_station', 'ram_avl', 'sat'], 'integer'],
            [['gprsdate', 'gpsdate', 'inoutdate', 'accdate', 'last_reset', 'last_gid_process', 'last_acc_off', 'last_opened', 'in_station_time', 'out_station_time'], 'safe'],
            [['gps_status', 'in_service'], 'boolean'],
            [['kmx', 'batt', 'ram_total', 'disk_ext_avl', 'disk_ext_total', 'disk_avl', 'disk_total', 'accuracy', 'alt', 'bearing', 'lat', 'lng'], 'number'],
            [['uuid'], 'string', 'max' => 100],
            [['emergency', 'acc', 'src_type'], 'string', 'max' => 1],
            [['xbin'], 'string', 'max' => 8],
            [['address'], 'string', 'max' => 150],
            [['imei'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mobileunitid' => 'Mobileunitid',
            'uuid' => 'Uuid',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'speed' => 'Speed',
            'course' => 'Course',
            'gprsdate' => 'Gprsdate',
            'gpsdate' => 'Gpsdate',
            'input' => 'Input',
            'output' => 'Output',
            'emergency' => 'Emergency',
            'acc' => 'Acc',
            'temp' => 'Temp',
            'tambon' => 'Tambon',
            'province' => 'Province',
            'amphur' => 'Amphur',
            'gps_status' => 'Gps Status',
            'trip' => 'Trip',
            'analog2' => 'Analog2',
            'inoutdate' => 'Inoutdate',
            'accdate' => 'Accdate',
            'stationid' => 'Stationid',
            'in_service' => 'In Service',
            'port' => 'Port',
            'last_reset' => 'Last Reset',
            'phone_number' => 'Phone Number',
            'last_gid_process' => 'Last Gid Process',
            'last_acc_off' => 'Last Acc Off',
            'last_opened' => 'Last Opened',
            'server_ip' => 'Server Ip',
            'kmx' => 'Kmx',
            'poi' => 'Poi',
            'rpm' => 'Rpm',
            'refno' => 'Refno',
            'xbin' => 'Xbin',
            'schild' => 'Schild',
            'seqno' => 'Seqno',
            'service_id' => 'Service ID',
            'in_station' => 'In Station',
            'out_station' => 'Out Station',
            'in_station_time' => 'In Station Time',
            'out_station_time' => 'Out Station Time',
            'batt' => 'Batt',
            'ram_avl' => 'Ram Avl',
            'ram_total' => 'Ram Total',
            'disk_ext_avl' => 'Disk Ext Avl',
            'disk_ext_total' => 'Disk Ext Total',
            'disk_avl' => 'Disk Avl',
            'disk_total' => 'Disk Total',
            'sat' => 'Sat',
            'accuracy' => 'Accuracy',
            'alt' => 'Alt',
            'bearing' => 'Bearing',
            'src_type' => 'Src Type',
            'address' => 'Address',
            'imei' => 'Imei',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }
}
