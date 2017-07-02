<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "basic_tbl".
 *
 * @property integer $id
 * @property string $code
 * @property string $taemin_name
 * @property integer $r_available_taemin
 * @property integer $r_customer
 * @property string $madmoun_name
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
 * @property string $field
 * @property string $reserve
 * @property string $created_at
 * @property string $updated_at
 */
class BasicTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'basic_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_active'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code', 'taemin_name'], 'string', 'max' => 100],
            [['madmoun_name'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters', 'field'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('basictbl', 'ID'),
            'code' => Yii::t('basictbl', 'Code'),
            'taemin_name' => Yii::t('basictbl', 'Taemin Name'),
            'r_available_taemin' => Yii::t('basictbl', 'R Available Taemin'),
            'r_customer' => Yii::t('basictbl', 'R Customer'),
            'madmoun_name' => Yii::t('basictbl', 'Madmoun Name'),
            'contract_date' => Yii::t('basictbl', 'Contract Date'),
            'start_date' => Yii::t('basictbl', 'Start Date'),
            'end_date' => Yii::t('basictbl', 'End Date'),
            'sale' => Yii::t('basictbl', 'Sale'),
            'sale_letters' => Yii::t('basictbl', 'Sale Letters'),
            'paid' => Yii::t('basictbl', 'Paid'),
            'paid_letters' => Yii::t('basictbl', 'Paid Letters'),
            'remaining' => Yii::t('basictbl', 'Remaining'),
            'coverage' => Yii::t('basictbl', 'Coverage'),
            'is_active' => Yii::t('basictbl', 'Is Active'),
            'field' => Yii::t('basictbl', 'Field'),
            'reserve' => Yii::t('basictbl', 'Reserve'),
            'created_at' => Yii::t('basictbl', 'Created At'),
            'updated_at' => Yii::t('basictbl', 'Updated At'),
        ];
    }
}
