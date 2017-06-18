<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hospitals".
 *
 * @property integer $id
 * @property string $code
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
 * @property double $coverage
 * @property string $birth
 * @property string $sex
 * @property integer $is_in_out
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Customers $rCustomer
 * @property AvailableTaemin $rAvailableTaemin
 */
class Hospitals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospitals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'birth', 'sex'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_in_out'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'birth', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code'], 'string', 'max' => 100],
            [['madmoun_name'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters'], 'string', 'max' => 200],
            [['sex'], 'string', 'max' => 25],
            [['r_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['r_customer' => 'id']],
            [['r_available_taemin'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableTaemin::className(), 'targetAttribute' => ['r_available_taemin' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('hospitals', 'ID'),
            'code' => Yii::t('hospitals', 'Code'),
            'r_available_taemin' => Yii::t('hospitals', 'R Available Taemin'),
            'r_customer' => Yii::t('hospitals', 'R Customer'),
            'madmoun_name' => Yii::t('hospitals', 'Madmoun Name'),
            'contract_date' => Yii::t('hospitals', 'Contract Date'),
            'start_date' => Yii::t('hospitals', 'Start Date'),
            'end_date' => Yii::t('hospitals', 'End Date'),
            'sale' => Yii::t('hospitals', 'Sale'),
            'sale_letters' => Yii::t('hospitals', 'Sale Letters'),
            'paid' => Yii::t('hospitals', 'Paid'),
            'paid_letters' => Yii::t('hospitals', 'Paid Letters'),
            'remaining' => Yii::t('hospitals', 'Remaining'),
            'coverage' => Yii::t('hospitals', 'Coverage'),
            'birth' => Yii::t('hospitals', 'Birth'),
            'sex' => Yii::t('hospitals', 'Sex'),
            'is_in_out' => Yii::t('hospitals', 'Is In Out'),
            'created_at' => Yii::t('hospitals', 'Created At'),
            'updated_at' => Yii::t('hospitals', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'r_customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAvailableTaemin()
    {
        return $this->hasOne(AvailableTaemin::className(), ['id' => 'r_available_taemin']);
    }
}
