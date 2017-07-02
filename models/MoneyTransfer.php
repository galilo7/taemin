<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "money_transfer".
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
 * @property double $coverage
 * @property integer $is_active
 * @property string $reserve
 * @property integer $no_persons
 * @property integer $no_banks
 * @property double $max_money
 * @property string $currency
 * @property string $field
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AvailableTaemin $rAvailableTaemin
 * @property Customers $rCustomer
 */
class MoneyTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'money_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'no_persons', 'no_banks', 'max_money', 'currency'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_active', 'no_persons', 'no_banks'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['coverage', 'max_money'], 'number'],
            [['code', 'taemin_name', 'currency'], 'string', 'max' => 100],
            [['madmoun_name'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters', 'field'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
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
            'id' => Yii::t('money_transfer', 'ID'),
            'code' => Yii::t('money_transfer', 'Code'),
            'taemin_name' => Yii::t('money_transfer', 'Taemin Name'),
            'r_available_taemin' => Yii::t('money_transfer', 'R Available Taemin'),
            'r_customer' => Yii::t('money_transfer', 'R Customer'),
            'madmoun_name' => Yii::t('money_transfer', 'Madmoun Name'),
            'contract_date' => Yii::t('money_transfer', 'Contract Date'),
            'start_date' => Yii::t('money_transfer', 'Start Date'),
            'end_date' => Yii::t('money_transfer', 'End Date'),
            'sale' => Yii::t('money_transfer', 'Sale'),
            'sale_letters' => Yii::t('money_transfer', 'Sale Letters'),
            'paid' => Yii::t('money_transfer', 'Paid'),
            'paid_letters' => Yii::t('money_transfer', 'Paid Letters'),
            'remaining' => Yii::t('money_transfer', 'Remaining'),
            'coverage' => Yii::t('money_transfer', 'Coverage'),
            'is_active' => Yii::t('money_transfer', 'Is Active'),
            'reserve' => Yii::t('money_transfer', 'Reserve'),
            'no_persons' => Yii::t('money_transfer', 'No Persons'),
            'no_banks' => Yii::t('money_transfer', 'No Banks'),
            'max_money' => Yii::t('money_transfer', 'Max Money'),
            'currency' => Yii::t('money_transfer', 'Currency'),
            'field' => Yii::t('money_transfer', 'Field'),
            'created_at' => Yii::t('money_transfer', 'Created At'),
            'updated_at' => Yii::t('money_transfer', 'Updated At'),
        ];
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
