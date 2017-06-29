<?php

namespace app\models\appmodels;

use app\models\MoneyTransfer;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppMoneyTransfer
 *
 * @author user
 */
class AppMoneyTransfer extends MoneyTransfer {

    public $customerName;

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function attributeLabels() {
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
            'created_at' => Yii::t('money_transfer', 'Created At'),
            'updated_at' => Yii::t('money_transfer', 'Updated At'),
            'customerName' => Yii::t('money_transfer', 'Customer Name'),
        ];
    }

}
