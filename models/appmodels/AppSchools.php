<?php

namespace app\models\appmodels;

use app\models\Schools;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppSchools
 *
 * @author user
 */
class AppSchools extends Schools {

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
            'id' => Yii::t('schools', 'ID'),
            'code' => Yii::t('schools', 'Code'),
            'taemin_name' => Yii::t('schools', 'Taemin Name'),
            'r_available_taemin' => Yii::t('schools', 'R Available Taemin'),
            'r_customer' => Yii::t('schools', 'R Customer'),
            'contract_date' => Yii::t('schools', 'Contract Date'),
            'start_date' => Yii::t('schools', 'Start Date'),
            'end_date' => Yii::t('schools', 'End Date'),
            'sale' => Yii::t('schools', 'Sale'),
            'sale_letters' => Yii::t('schools', 'Sale Letters'),
            'paid' => Yii::t('schools', 'Paid'),
            'paid_letters' => Yii::t('schools', 'Paid Letters'),
            'remaining' => Yii::t('schools', 'Remaining'),
            'coverage' => Yii::t('schools', 'Coverage'),
            'is_active' => Yii::t('schools', 'Is Active'),
            'reserve' => Yii::t('schools', 'Reserve'),
            'school_name' => Yii::t('schools', 'School Name'),
            'school_address' => Yii::t('schools', 'School Address'),
            'school_type' => Yii::t('schools', 'School Type'),
            'manager' => Yii::t('schools', 'Manager'),
            'number_of_students' => Yii::t('schools', 'Number Of Students'),
            'student_price' => Yii::t('schools', 'Student Price'),
            'is_morning' => Yii::t('schools', 'Is Morning'),
            'is_afternoon' => Yii::t('schools', 'Is Afternoon'),
            'created_at' => Yii::t('schools', 'Created At'),
            'updated_at' => Yii::t('schools', 'Updated At'),
            'field' => Yii::t('schools', 'Field'),
            'file' => Yii::t('schools', 'File'),
            'customerName' => Yii::t('schools', 'Customer Name'),
        ];
    }

}
