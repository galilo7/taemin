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
    public $file;

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

    public function rules() {
        $rules = parent::rules();
        $rules[] = [['file'], 'file', 'skipOnEmpty' => true];
//        $rules[] = [['file'], 'safe'];
//        $rules[] = [['filex'], 'file', 'extensions' => 'pdf'];
        return $rules;
    }

//
//    public function upload() {
//        if ($this->validate()) {
//            $this->file->saveAs('uploads/' . time() . '.' . $this->file->extension);
//            return true;
//        } else {
//            return false;
//        }
//    }

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
            'created_at' => Yii::t('cfw', 'Created At'),
            'updated_at' => Yii::t('cfw', 'Updated At'),
            'field' => Yii::t('cfw', 'Field'),
            'file' => Yii::t('cfw', 'File'),
            'customerName' => Yii::t('cfw', 'Customer Name'),
        ];
    }

//    public function getImageFile() {
//        return isset($this->field) ? Yii::$app->params['uploadPath'] . $this->avatar : null;
//    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() {
        // return a default image placeholder if your source avatar is not found
        $avatar = isset($this->avatar) ? $this->avatar : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . $avatar;
    }

    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $file = UploadedFile::getInstance($this, 'file');

        // if no image was uploaded abort the upload
        if (empty($file)) {
            return false;
        }

        // store the source file name
        $this->field = 'uploads/' . time() . '.' . $model->file->extension;

        // the uploaded image instance
        return $file;
    }

    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteFile() {
        if (isset($this->field)) {
            $file = $this->field;
        } else {
            $file = null;
        }

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->field = null;
//        $this->filename = null;

        return true;
    }

}
