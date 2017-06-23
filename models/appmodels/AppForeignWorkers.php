<?php

namespace app\models\appmodels;

use app\models\ForeignWorkers;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppForeignWorkers
 *
 * @author user
 */
class AppForeignWorkers extends ForeignWorkers {

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

}
