<?php

namespace app\models\appmodels;

use app\models\ForeignWorkers;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppForeignWorkers
 *
 * @author user
 */
class AppForeignWorkers extends ForeignWorkers {

    public $customerName;
    public $fullName;

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
        return $this->hasOne(AppForeignWorkers::className(), ['r_customer' => 'id']);
    }

    public function getFullName() {
        return $this->customers->first_name . " " . $this->customers->fathers_name . " " . $this->customers->last_name . "";
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('foreign_workers', 'ID'),
            'code' => Yii::t('foreign_workers', 'Code'),
            'taemin_name' => Yii::t('foreign_workers', 'Taemin Name'),
            'r_available_taemin' => Yii::t('foreign_workers', 'R Available Taemin'),
            'r_customer' => Yii::t('foreign_workers', 'R Customer'),
            'contract_date' => Yii::t('foreign_workers', 'Contract Date'),
            'start_date' => Yii::t('foreign_workers', 'Start Date'),
            'end_date' => Yii::t('foreign_workers', 'End Date'),
            'sale' => Yii::t('foreign_workers', 'Sale'),
            'sale_letters' => Yii::t('foreign_workers', 'Sale Letters'),
            'paid' => Yii::t('foreign_workers', 'Paid'),
            'paid_letters' => Yii::t('foreign_workers', 'Paid Letters'),
            'remaining' => Yii::t('foreign_workers', 'Remaining'),
            'coverage' => Yii::t('foreign_workers', 'Coverage'),
            'is_active' => Yii::t('foreign_workers', 'Is Active'),
            'reserve' => Yii::t('foreign_workers', 'Reserve'),
            'kafil_name' => Yii::t('foreign_workers', 'Kafil Name'),
            'madmoun_name' => Yii::t('foreign_workers', 'Madmoun Name'),
            'worker_nationality' => Yii::t('foreign_workers', 'Worker Nationality'),
            'worker_sex' => Yii::t('foreign_workers', 'Worker Sex'),
            'worker_birth' => Yii::t('foreign_workers', 'Worker Birth'),
            'worker_passport_no' => Yii::t('foreign_workers', 'Worker Passport No'),
            'worker_job' => Yii::t('foreign_workers', 'Worker Job'),
            'created_at' => Yii::t('foreign_workers', 'Created At'),
            'updated_at' => Yii::t('foreign_workers', 'Updated At'),
            'customerName' => Yii::t('foreign_workers', 'Customer Name'),
        ];
    }

}
