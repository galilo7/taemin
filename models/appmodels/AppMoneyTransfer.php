<?php

namespace app\models\appmodels;

use app\models\MoneyTransfer;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppMoneyTransfer
 *
 * @author user
 */
class AppMoneyTransfer extends MoneyTransfer {

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
