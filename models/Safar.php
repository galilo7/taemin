<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "safar".
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
 * @property integer $is_active
 * @property string $reserve
 * @property string $destination_country
 * @property string $residence_country
 * @property string $nationality
 * @property string $sex
 * @property string $passport_no
 * @property string $birth
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Customers $rCustomer
 * @property AvailableTaemin $rAvailableTaemin
 */
class Safar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'safar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'destination_country', 'residence_country', 'nationality', 'sex', 'passport_no', 'birth'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_active'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'birth', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code'], 'string', 'max' => 100],
            [['madmoun_name', 'passport_no'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
            [['destination_country', 'residence_country', 'nationality'], 'string', 'max' => 150],
            [['sex'], 'string', 'max' => 15],
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
            'id' => Yii::t('safar', 'ID'),
            'code' => Yii::t('safar', 'Code'),
            'r_available_taemin' => Yii::t('safar', 'R Available Taemin'),
            'r_customer' => Yii::t('safar', 'R Customer'),
            'madmoun_name' => Yii::t('safar', 'Madmoun Name'),
            'contract_date' => Yii::t('safar', 'Contract Date'),
            'start_date' => Yii::t('safar', 'Start Date'),
            'end_date' => Yii::t('safar', 'End Date'),
            'sale' => Yii::t('safar', 'Sale'),
            'sale_letters' => Yii::t('safar', 'Sale Letters'),
            'paid' => Yii::t('safar', 'Paid'),
            'paid_letters' => Yii::t('safar', 'Paid Letters'),
            'remaining' => Yii::t('safar', 'Remaining'),
            'coverage' => Yii::t('safar', 'Coverage'),
            'is_active' => Yii::t('safar', 'Is Active'),
            'reserve' => Yii::t('safar', 'Reserve'),
            'destination_country' => Yii::t('safar', 'Destination Country'),
            'residence_country' => Yii::t('safar', 'Residence Country'),
            'nationality' => Yii::t('safar', 'Nationality'),
            'sex' => Yii::t('safar', 'Sex'),
            'passport_no' => Yii::t('safar', 'Passport No'),
            'birth' => Yii::t('safar', 'Birth'),
            'created_at' => Yii::t('safar', 'Created At'),
            'updated_at' => Yii::t('safar', 'Updated At'),
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
