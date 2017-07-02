<?php

namespace app\models\appmodels;

use app\models\Hospitals;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppHospitals
 *
 * @author user
 */
class AppHospitals extends Hospitals {

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
            'id' => Yii::t('hospitals', 'ID'),
            'code' => Yii::t('hospitals', 'Code'),
            'taemin_name' => Yii::t('hospitals', 'Taemin Name'),
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
            'is_active' => Yii::t('hospitals', 'Is Active'),
            'reserve' => Yii::t('hospitals', 'Reserve'),
            'birth' => Yii::t('hospitals', 'Birth'),
            'sex' => Yii::t('hospitals', 'Sex'),
            'is_in_out' => Yii::t('hospitals', 'Is In Out'),
            'created_at' => Yii::t('hospitals', 'Created At'),
            'updated_at' => Yii::t('hospitals', 'Updated At'),
            'field' => Yii::t('hospitals', 'Field'),
            'file' => Yii::t('hospitals', 'File'),
            'customerName' => Yii::t('hospitals', 'Customer Name'),
        ];
    }

}
