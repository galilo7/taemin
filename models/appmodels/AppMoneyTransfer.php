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
    public $file;

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['file'], 'file', 'skipOnEmpty' => true];

        return $rules;
    }

    public function deleteFile() {
        $uploadPath = 'uploads/';

        if (isset($this->field)) {
            $file = $uploadPath . $this->field;
        } else {
            $file = null;
            $result = "الملف غير موجود في قاعدة البيانات";
        }

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            $result = "الملف غير موجود على السيرفر";
            return $result;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            $result = "لم يتم حذف الملف عن السيرفر";
            return $result;
        }

        // if deletion successful, reset your file attributes
        $this->field = null;
        $this->save();
//        $this->filename = null;
        $result = "تم حذف الملف";
        return $result;
    }

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
            'field' => Yii::t('money_transfer', 'Field'),
            'file' => Yii::t('money_transfer', 'File'),
            'customerName' => Yii::t('money_transfer', 'Customer Name'),
        ];
    }

}
