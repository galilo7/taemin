<?php

namespace app\models\appmodels;

use app\models\appmodels\AppCfw;
use app\models\appmodels\AppCustomers;
use app\models\Cfw;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * Description of AppCfw
 *
 * @author user
 */
class AppCfw extends Cfw {

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

    public function getCustomers() {
        return $this->hasOne(AppCfw::className(), ['r_customer' => 'id']);
    }

//    public static function getFullNameS() {
//        return $customers->first_name . " " . $customers->fathers_name . " " . $customers->last_name . "";
////        return $this->customers->first_ame . " " . $this->customers->father_name . " " . $this->customers->last_name . " - " . $this->customers->phone1 . "";
//    }

    public static function getFullNameS() {
        return ArrayHelper::map(AppCustomers::find()->select(
                                        ['id', new Expression('CONCAT(first_name, " ",fathers_name," ",last_name) as c_first_name')])
                                ->asArray()
                                ->all(), 'id', 'c_first_name');
    }

    public function getFullName() {
        return $this->customers->first_name . " " . $this->customers->fathers_name . " " . $this->customers->last_name . "";
    }

    public function getFirstName() {
        return $this->customers->first_name;
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('cfw', 'ID'),
            'code' => Yii::t('cfw', 'Code'),
            'taemin_name' => Yii::t('cfw', 'Taemin Name'),
            'r_available_taemin' => Yii::t('cfw', 'R Available Taemin'),
            'r_customer' => Yii::t('cfw', 'R Customer'),
            'madmoun_name' => Yii::t('cfw', 'Madmoun Name'),
            'contract_date' => Yii::t('cfw', 'Contract Date'),
            'start_date' => Yii::t('cfw', 'Start Date'),
            'end_date' => Yii::t('cfw', 'End Date'),
            'sale' => Yii::t('cfw', 'Sale'),
            'sale_letters' => Yii::t('cfw', 'Sale Letters'),
            'paid' => Yii::t('cfw', 'Paid'),
            'paid_letters' => Yii::t('cfw', 'Paid Letters'),
            'remaining' => Yii::t('cfw', 'Remaining'),
            'coverage' => Yii::t('cfw', 'Coverage'),
            'is_active' => Yii::t('cfw', 'Is Active'),
            'reserve' => Yii::t('cfw', 'Reserve'),
            'property_no' => Yii::t('cfw', 'Property No'),
            'number_of_workers' => Yii::t('cfw', 'Number Of Workers'),
            'building' => Yii::t('cfw', 'Building'),
            'field' => Yii::t('cfw', 'Field'),
            'created_at' => Yii::t('cfw', 'Created At'),
            'updated_at' => Yii::t('cfw', 'Updated At'),
            'customerName' => Yii::t('cfw', 'Customer Name'),
        ];
    }

}
