<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "available_taemin".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $r_company
 * @property integer $cost
 * @property integer $price
 * @property double $percentage
 * @property string $price_description
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Companies $rCompany
 * @property Cfw[] $cfws
 * @property ForeignWorkers[] $foreignWorkers
 * @property Hospitals[] $hospitals
 * @property MoneyTransfer[] $moneyTransfers
 * @property Safar[] $safars
 * @property Schools[] $schools
 * @property VehicleTaemin[] $vehicleTaemins
 */
class AvailableTaemin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'available_taemin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'r_company', 'price', 'type'], 'required'],
            [['r_company', 'cost', 'price'], 'integer'],
            [['percentage'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 250],
            [['price_description', 'type'], 'string', 'max' => 100],
            [['r_company'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['r_company' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('available_taemin', 'ID'),
            'name' => Yii::t('available_taemin', 'Name'),
            'description' => Yii::t('available_taemin', 'Description'),
            'r_company' => Yii::t('available_taemin', 'R Company'),
            'cost' => Yii::t('available_taemin', 'Cost'),
            'price' => Yii::t('available_taemin', 'Price'),
            'percentage' => Yii::t('available_taemin', 'Percentage'),
            'price_description' => Yii::t('available_taemin', 'Price Description'),
            'type' => Yii::t('available_taemin', 'Type'),
            'created_at' => Yii::t('available_taemin', 'Created At'),
            'updated_at' => Yii::t('available_taemin', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'r_company']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfws()
    {
        return $this->hasMany(Cfw::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForeignWorkers()
    {
        return $this->hasMany(ForeignWorkers::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitals()
    {
        return $this->hasMany(Hospitals::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyTransfers()
    {
        return $this->hasMany(MoneyTransfer::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSafars()
    {
        return $this->hasMany(Safar::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(Schools::className(), ['r_available_taemin' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleTaemins()
    {
        return $this->hasMany(VehicleTaemin::className(), ['r_available_taemin' => 'id']);
    }
}
