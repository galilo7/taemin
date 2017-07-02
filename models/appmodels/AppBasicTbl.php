<?php

namespace app\models\appmodels;

use app\models\BasicTbl;
use Yii;

class AppBasicTbl extends BasicTbl {

    public $fullName;

    public function getCustomers() {
        return $this->hasOne(AppBasicTbl::className(), ['r_customer' => 'id']);
    }

    public function getFullName() {
        return $this->customers->first_name . " " . $this->customers->fathers_name . " " . $this->customers->last_name . "";
    }

//    public function attributeLabels() {
//        return [
//            'id' => Yii::t('basictbl', 'ID'),
//            'code' => Yii::t('basictbl', 'Code'),
//            'r_available_taemin' => Yii::t('basictbl', 'R Available Taemin'),
//            'r_customer' => Yii::t('basictbl', 'R Customer'),
//            'madmoun_name' => Yii::t('basictbl', 'Madmoun Name'),
//            'contract_date' => Yii::t('basictbl', 'Contract Date'),
//            'start_date' => Yii::t('basictbl', 'Start Date'),
//            'end_date' => Yii::t('basictbl', 'End Date'),
//            'sale' => Yii::t('basictbl', 'Sale'),
//            'sale_letters' => Yii::t('basictbl', 'Sale Letters'),
//            'paid' => Yii::t('basictbl', 'Paid'),
//            'paid_letters' => Yii::t('basictbl', 'Paid Letters'),
//            'remaining' => Yii::t('basictbl', 'Remaining'),
//            'coverage' => Yii::t('basictbl', 'Coverage'),
//            'is_active' => Yii::t('basictbl', 'Is Active'),
//            'reserve' => Yii::t('basictbl', 'Reserve'),
//            'created_at' => Yii::t('basictbl', 'Created At'),
//            'updated_at' => Yii::t('basictbl', 'Updated At'),
//        ];
//    }
//    public function attributeLabels() {
//        $att = parent::attributeLabels();
//        $att[] = ['Full Name' => Yii::t('basic_tbl', 'Full Name')];
//        return $att;
//    }
}
