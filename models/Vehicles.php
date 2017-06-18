<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property integer $id
 * @property string $type
 * @property string $model
 * @property string $vehicle_usage
 * @property string $year
 * @property string $net_load
 * @property string $registration_number
 * @property integer $horses
 * @property integer $passengers
 * @property string $shecci_number
 * @property string $engine_number
 * @property integer $preview_month
 * @property integer $preview_cost
 * @property string $created_at
 * @property string $updated_at
 *
 * @property VehicleTaemin[] $vehicleTaemins
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'model', 'vehicle_usage', 'year', 'net_load', 'registration_number', 'horses', 'passengers', 'shecci_number', 'engine_number', 'preview_month', 'preview_cost'], 'required'],
            [['year', 'created_at', 'updated_at'], 'safe'],
            [['horses', 'passengers', 'preview_month', 'preview_cost'], 'integer'],
            [['type', 'model', 'vehicle_usage'], 'string', 'max' => 100],
            [['net_load'], 'string', 'max' => 20],
            [['registration_number', 'shecci_number', 'engine_number'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('vehicles', 'ID'),
            'type' => Yii::t('vehicles', 'Type'),
            'model' => Yii::t('vehicles', 'Model'),
            'vehicle_usage' => Yii::t('vehicles', 'Vehicle Usage'),
            'year' => Yii::t('vehicles', 'Year'),
            'net_load' => Yii::t('vehicles', 'Net Load'),
            'registration_number' => Yii::t('vehicles', 'Registration Number'),
            'horses' => Yii::t('vehicles', 'Horses'),
            'passengers' => Yii::t('vehicles', 'Passengers'),
            'shecci_number' => Yii::t('vehicles', 'Shecci Number'),
            'engine_number' => Yii::t('vehicles', 'Engine Number'),
            'preview_month' => Yii::t('vehicles', 'Preview Month'),
            'preview_cost' => Yii::t('vehicles', 'Preview Cost'),
            'created_at' => Yii::t('vehicles', 'Created At'),
            'updated_at' => Yii::t('vehicles', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleTaemins()
    {
        return $this->hasMany(VehicleTaemin::className(), ['r_vehicle' => 'id']);
    }
}
