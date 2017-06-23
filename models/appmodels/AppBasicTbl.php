<?php

namespace app\models\appmodels;

use app\models\BasicTbl;
use Yii;

class AppBasicTbl extends BasicTbl {

    public $fullName;

    public function getCustomers() {
        return $this->hasOne(AppBasicTbl::className(), ['r_customer' => 'id']);
    }

    public function getFullName() {
        return $this->customers->first_name . " " . $this->customers->fathers_name . " " . $this->customers->last_name . "";
    }

}
