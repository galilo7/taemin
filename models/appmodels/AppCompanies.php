<?php

namespace app\models\appmodels;

use app\models\Companies;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Description of AppCompanies
 *
 * @author user
 */
class AppCompanies extends Companies {

    public function rules() {
        $rules = parent::rules();
        $rules[] = ['email', 'email'];
        $rules[] = ['website', 'url', 'defaultScheme' => 'http'];
        return $rules;
    }

    public
            function behaviors() {
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
