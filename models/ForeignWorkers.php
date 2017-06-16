<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foreign_workers".
 *
 * @property integer $id
 * @property string $code
 * @property integer $r_available_taemin
 * @property integer $r_customer
 * @property string $contract_date
 * @property string $start_date
 * @property string $end_date
 * @property integer $sale
 * @property string $sale_letters
 * @property integer $paid
 * @property string $paid_letters
 * @property integer $remaining
 * @property double $coverage
 * @property string $kafil_name
 * @property string $madmoun_name
 * @property string $worker_nationality
 * @property string $worker_sex
 * @property string $worker_birth
 * @property string $worker_passport_no
 * @property string $worker_job
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Customers $rCustomer
 * @property AvailableTaemin $rAvailableTaemin
 */
class ForeignWorkers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foreign_workers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'kafil_name', 'madmoun_name', 'worker_nationality', 'worker_sex', 'worker_passport_no', 'worker_job'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'worker_birth', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code'], 'string', 'max' => 100],
            [['sale_letters', 'paid_letters', 'kafil_name'], 'string', 'max' => 200],
            [['madmoun_name', 'worker_passport_no', 'worker_job'], 'string', 'max' => 250],
            [['worker_nationality'], 'string', 'max' => 30],
            [['worker_sex'], 'string', 'max' => 10],
            [['r_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['r_customer' => 'id']],
            [['r_available_taemin'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableTaemin::className(), 'targetAttribute' => ['r_available_taemin' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('foreign_workers', 'ID'),
            'code' => Yii::t('foreign_workers', 'Code'),
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
            'kafil_name' => Yii::t('foreign_workers', 'Kafil Name'),
            'madmoun_name' => Yii::t('foreign_workers', 'Madmoun Name'),
            'worker_nationality' => Yii::t('foreign_workers', 'Worker Nationality'),
            'worker_sex' => Yii::t('foreign_workers', 'Worker Sex'),
            'worker_birth' => Yii::t('foreign_workers', 'Worker Birth'),
            'worker_passport_no' => Yii::t('foreign_workers', 'Worker Passport No'),
            'worker_job' => Yii::t('foreign_workers', 'Worker Job'),
            'created_at' => Yii::t('foreign_workers', 'Created At'),
            'updated_at' => Yii::t('foreign_workers', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'r_customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAvailableTaemin()
    {
        return $this->hasOne(AvailableTaemin::className(), ['id' => 'r_available_taemin']);
    }
}
