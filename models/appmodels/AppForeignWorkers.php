<?php

namespace app\models\appmodels;

use app\models\ForeignWorkers;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppForeignWorkers
 *
 * @author user
 */
class AppForeignWorkers extends ForeignWorkers {

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
