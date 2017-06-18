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

    public function rules() {
        $rules = parent::rules();
        $rules[] = ['preview_month', 'in', 'range' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]];
        $rules[] = [['horses', 'passengers'], 'integer', 'min' => 0];
        $rules[] = ['year', 'integer'];
        $rules[] = ['net_load', 'number'];

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

}
