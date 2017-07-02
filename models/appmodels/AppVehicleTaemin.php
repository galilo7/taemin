<?php

namespace app\models\appmodels;

use app\models\VehicleTaemin;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppVehicleTaemin
 *
 * @author user
 */
class AppVehicleTaemin extends VehicleTaemin {

    public $customerName;
    public $file;

    public function rules() {
        $rules = parent::rules();
//        $rules[] = [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'];
        $rules[] = [['file'], 'file', 'extensions' => 'pdf'];
        return $rules;
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

    public function attributeLabels() {
        return [
            'id' => Yii::t('vehicle_taemin', 'ID'),
            'code' => Yii::t('vehicle_taemin', 'Code'),
            'taemin_name' => Yii::t('vehicle_taemin', 'Taemin Name'),
            'r_available_taemin' => Yii::t('vehicle_taemin', 'R Available Taemin'),
            'r_customer' => Yii::t('vehicle_taemin', 'R Customer'),
            'madmoun_name' => Yii::t('vehicle_taemin', 'Madmoun Name'),
            'contract_date' => Yii::t('vehicle_taemin', 'Contract Date'),
            'start_date' => Yii::t('vehicle_taemin', 'Start Date'),
            'end_date' => Yii::t('vehicle_taemin', 'End Date'),
            'sale' => Yii::t('vehicle_taemin', 'Sale'),
            'sale_letters' => Yii::t('vehicle_taemin', 'Sale Letters'),
            'paid' => Yii::t('vehicle_taemin', 'Paid'),
            'paid_letters' => Yii::t('vehicle_taemin', 'Paid Letters'),
            'remaining' => Yii::t('vehicle_taemin', 'Remaining'),
            'is_military' => Yii::t('vehicle_taemin', 'Is Military'),
            'r_vehicle' => Yii::t('vehicle_taemin', 'R Vehicle'),
            'coverage' => Yii::t('vehicle_taemin', 'Coverage'),
            'is_active' => Yii::t('vehicle_taemin', 'Is Active'),
            'reserve' => Yii::t('vehicle_taemin', 'Reserve'),
            'created_at' => Yii::t('vehicle_taemin', 'Created At'),
            'updated_at' => Yii::t('vehicle_taemin', 'Updated At'),
            'field' => Yii::t('vehicle_taemin', 'Field'),
            'file' => Yii::t('vehicle_taemin', 'File'),
            'customerName' => Yii::t('vehicle_taemin', 'Customer Name'),
        ];
    }

}
