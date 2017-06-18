<?php

namespace app\models\appmodels;

use app\models\Safar;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppSafar
 *
 * @author user
 */
class AppSafar extends Safar {

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
