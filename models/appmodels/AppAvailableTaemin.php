<?php

namespace app\models\appmodels;

use app\models\AvailableTaemin;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppAvailableTaemin
 *
 * @author user
 */
class AppAvailableTaemin extends AvailableTaemin {

    public function rules() {

        $rules = parent::rules();

        $rules[] = [['cost', 'price'], 'integer', 'min' => 0];
        $rules[] = ['percentage', 'number', 'min' => 0, 'max' => 100];
//        die(\yii\helpers\VarDumper::dump($rules, 4, TRUE));
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

    public function getCompanies() {
        return $this->hasOne(AppCompanies::className(), ['id' => 'r_company']);
    }

//    public function getCompaniesName() {
//        return $this->company->name;
//    }

    public function getCompanyName() {
        return $this->companies->name;
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('available_taemin', 'ID'),
            'name' => Yii::t('available_taemin', 'Name'),
            'description' => Yii::t('available_taemin', 'Description'),
            'r_company' => Yii::t('available_taemin', 'R Company'),
            'cost' => Yii::t('available_taemin', 'Cost'),
            'price' => Yii::t('available_taemin', 'Price'),
            'percentage' => Yii::t('available_taemin', 'Percentage'),
            'price_description' => Yii::t('available_taemin', 'Price Description'),
            'type' => Yii::t('available_taemin', 'Type'),
            'created_at' => Yii::t('available_taemin', 'Created At'),
            'updated_at' => Yii::t('available_taemin', 'Updated At'),
            'companyName' => Yii::t('available_taemin', 'Company Name'),
        ];
    }

//    public function attributeLabels() {
//        $att = parent::attributeLabels();
//        $att[] = ['companyName' => Yii::t('available_taemin', 'Company Name')];
//        return $att;
//    }
}
