<?php

namespace app\models\appmodels;

use app\models\Cfw;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppCfw
 *
 * @author user
 */
class AppCfw extends Cfw {

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
