<?php

namespace app\models\appmodels;

use app\models\Customers;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppCustomers
 *
 * @author user
 */
class AppCustomers extends Customers {

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

}
