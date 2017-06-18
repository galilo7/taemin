<?php

namespace app\models\appmodels;

use app\models\Hospitals;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppHospitals
 *
 * @author user
 */
class AppHospitals extends Hospitals {

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
