<?php

namespace app\models\appmodels;

use app\models\Vehicles;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppVehicles
 *
 * @author user
 */
class AppVehicles extends Vehicles {

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
