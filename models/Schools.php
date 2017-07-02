<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schools".
 *
 * @property integer $id
 * @property string $code
 * @property string $taemin_name
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
 * @property integer $is_active
 * @property string $reserve
 * @property integer $school_name
 * @property integer $school_address
 * @property string $school_type
 * @property string $manager
 * @property integer $number_of_students
 * @property integer $student_price
 * @property integer $is_morning
 * @property integer $is_afternoon
 * @property string $field
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AvailableTaemin $rAvailableTaemin
 * @property Customers $rCustomer
 */
class Schools extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters', 'school_name', 'school_address', 'school_type', 'manager', 'number_of_students', 'student_price', 'is_morning', 'is_afternoon'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_active', 'school_name', 'school_address', 'number_of_students', 'student_price', 'is_morning', 'is_afternoon'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code', 'taemin_name'], 'string', 'max' => 100],
            [['sale_letters', 'paid_letters', 'manager', 'field'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
            [['school_type'], 'string', 'max' => 25],
            [['r_available_taemin'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableTaemin::className(), 'targetAttribute' => ['r_available_taemin' => 'id']],
            [['r_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['r_customer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
            'field' => Yii::t('schools', 'Field'),
            'created_at' => Yii::t('schools', 'Created At'),
            'updated_at' => Yii::t('schools', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAvailableTaemin()
    {
        return $this->hasOne(AvailableTaemin::className(), ['id' => 'r_available_taemin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'r_customer']);
    }
}
