<?php

namespace app\models\appmodels;

use app\models\Safar;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppSafar
 *
 * @author user
 */
class AppSafar extends Safar {

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
            'id' => Yii::t('safar', 'ID'),
            'code' => Yii::t('safar', 'Code'),
            'taemin_name' => Yii::t('safar', 'Taemin Name'),
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
            'field' => Yii::t('safar', 'Field'),
            'file' => Yii::t('safar', 'File'),
            'customerName' => Yii::t('safar', 'Customer Name'),
        ];
    }

}
