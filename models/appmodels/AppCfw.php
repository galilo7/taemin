<?php

namespace app\models\appmodels;

use app\models\Cfw;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * Description of AppCfw
 *
 * @author user
 */
class AppCfw extends Cfw {

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

}
