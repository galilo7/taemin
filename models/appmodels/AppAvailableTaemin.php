<?php

namespace app\models\appmodels;

use app\models\AvailableTaemin;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppAvailableTaemin
 *
 * @author user
 */
class AppAvailableTaemin extends AvailableTaemin {

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
