<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cfw".
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
 * @property string $reserve
 * @property string $property_no
 * @property integer $number_of_workers
 * @property string $building
 * @property string $field
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AvailableTaemin $rAvailableTaemin
 * @property Customers $rCustomer
 */
class Cfw extends ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cfw';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale', 'sale_letters'], 'required'],
            [['r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'is_active', 'number_of_workers'], 'integer'],
            [['contract_date', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['code', 'taemin_name'], 'string', 'max' => 100],
            [['madmoun_name'], 'string', 'max' => 250],
            [['sale_letters', 'paid_letters', 'field'], 'string', 'max' => 200],
            [['reserve'], 'string', 'max' => 50],
            [['property_no', 'building'], 'string', 'max' => 150],
            [['r_available_taemin'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableTaemin::className(), 'targetAttribute' => ['r_available_taemin' => 'id']],
            [['r_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['r_customer' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
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
            'field' => Yii::t('cfw', 'Field'),
            'created_at' => Yii::t('cfw', 'Created At'),
            'updated_at' => Yii::t('cfw', 'Updated At'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getRAvailableTaemin() {
        return $this->hasOne(AvailableTaemin::className(), ['id' => 'r_available_taemin']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRCustomer() {
        return $this->hasOne(Customers::className(), ['id' => 'r_customer']);
    }

}
