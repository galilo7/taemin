<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $fathers_name
 * @property string $last_name
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property integer $is_wakil
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Cfw[] $cfws
 * @property ForeignWorkers[] $foreignWorkers
 * @property Hospitals[] $hospitals
 * @property MoneyTransfer[] $moneyTransfers
 * @property Safar[] $safars
 * @property Schools[] $schools
 * @property VehicleTaemin[] $vehicleTaemins
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'fathers_name', 'last_name', 'phone1', 'address'], 'required'],
            [['is_wakil'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'fathers_name'], 'string', 'max' => 100],
            [['last_name', 'phone1', 'phone2'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('customers', 'ID'),
            'first_name' => Yii::t('customers', 'First Name'),
            'fathers_name' => Yii::t('customers', 'Fathers Name'),
            'last_name' => Yii::t('customers', 'Last Name'),
            'phone1' => Yii::t('customers', 'Phone1'),
            'phone2' => Yii::t('customers', 'Phone2'),
            'address' => Yii::t('customers', 'Address'),
            'is_wakil' => Yii::t('customers', 'Is Wakil'),
            'created_at' => Yii::t('customers', 'Created At'),
            'updated_at' => Yii::t('customers', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfws()
    {
        return $this->hasMany(Cfw::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForeignWorkers()
    {
        return $this->hasMany(ForeignWorkers::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitals()
    {
        return $this->hasMany(Hospitals::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyTransfers()
    {
        return $this->hasMany(MoneyTransfer::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSafars()
    {
        return $this->hasMany(Safar::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(Schools::className(), ['r_customer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleTaemins()
    {
        return $this->hasMany(VehicleTaemin::className(), ['r_customer' => 'id']);
    }
}
