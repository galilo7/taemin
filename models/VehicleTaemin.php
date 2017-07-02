<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_taemin".
 *
 * @property integer $id
 * @property string $code
 * @property string $taemin_name
 * @property integer $r_available_taemin
 * @property integer $r_customer
 * @property string $madmoun_name
 * @property string $contract_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $sale
 * @property string $sale_letters
 * @property integer $paid
 * @property string $paid_letters
 * @property integer $remaining
 * @property integer $is_military
 * @property integer $r_vehicle
 * @property double $coverage
 * @property integer $is_active
 * @property string $reserve
 * @property string $field
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Vehicles $rVehicle
 * @property AvailableTaemin $rAvailableTaemin
 * @property Customers $rCustomer
 */
class VehicleTaemin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_taemin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'r_vehicle'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_military', 'r_vehicle', 'is_active'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code', 'taemin_name'], 'string', 'max' => 100],
            [['madmoun_name'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters', 'field'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
            [['r_vehicle'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicles::className(), 'targetAttribute' => ['r_vehicle' => 'id']],
            [['r_available_taemin'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableTaemin::className(), 'targetAttribute' => ['r_available_taemin' => 'id']],
            [['r_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['r_customer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('vehicle_taemin', 'ID'),
            'code' => Yii::t('vehicle_taemin', 'Code'),
            'taemin_name' => Yii::t('vehicle_taemin', 'Taemin Name'),
            'r_available_taemin' => Yii::t('vehicle_taemin', 'R Available Taemin'),
            'r_customer' => Yii::t('vehicle_taemin', 'R Customer'),
            'madmoun_name' => Yii::t('vehicle_taemin', 'Madmoun Name'),
            'contract_date' => Yii::t('vehicle_taemin', 'Contract Date'),
            'start_date' => Yii::t('vehicle_taemin', 'Start Date'),
            'end_date' => Yii::t('vehicle_taemin', 'End Date'),
            'sale' => Yii::t('vehicle_taemin', 'Sale'),
            'sale_letters' => Yii::t('vehicle_taemin', 'Sale Letters'),
            'paid' => Yii::t('vehicle_taemin', 'Paid'),
            'paid_letters' => Yii::t('vehicle_taemin', 'Paid Letters'),
            'remaining' => Yii::t('vehicle_taemin', 'Remaining'),
            'is_military' => Yii::t('vehicle_taemin', 'Is Military'),
            'r_vehicle' => Yii::t('vehicle_taemin', 'R Vehicle'),
            'coverage' => Yii::t('vehicle_taemin', 'Coverage'),
            'is_active' => Yii::t('vehicle_taemin', 'Is Active'),
            'reserve' => Yii::t('vehicle_taemin', 'Reserve'),
            'field' => Yii::t('vehicle_taemin', 'Field'),
            'created_at' => Yii::t('vehicle_taemin', 'Created At'),
            'updated_at' => Yii::t('vehicle_taemin', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRVehicle()
    {
        return $this->hasOne(Vehicles::className(), ['id' => 'r_vehicle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAvailableTaemin()
    {
        return $this->hasOne(AvailableTaemin::className(), ['id' => 'r_available_taemin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'r_customer']);
    }
}
