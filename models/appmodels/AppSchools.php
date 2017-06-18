<?php

namespace app\models\appmodels;

use app\models\Schools;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppSchools
 *
 * @author user
 */
class AppSchools extends Schools {

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
