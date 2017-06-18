<?php

namespace app\models\appmodels;

use app\models\VehicleTaemin;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppVehicleTaemin
 *
 * @author user
 */
class AppVehicleTaemin extends VehicleTaemin {

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
