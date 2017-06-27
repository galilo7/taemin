<?php

namespace app\models\appmodels;

use yii\base\Model;

class AppNewTaeminPolicy extends Model {

    public $selectedTaeminName;
    public static $taemin_name_items = ["حريق" => "حريق", "مسؤولية مدنية" => "مسؤولية مدنية", "طوارئ عمل" => "طوارئ عمل", "مدارس" => "مدارس", "عمال أجانب" => "عمال أجانب", "استشفاء" => "استشفاء", "سفر" => "سفر", "إلزامي" => "إلزامي", "مادي" => "مادي", "نقل أموال" => "نقل أموال", "", "", "", "", "", "", "", "", "", ""];

//    public static function tableName() {
//        return 'customers';
//    }

    public function rules() {
        return [
            ['selectedTaeminName', 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'selectedTaeminName' => 'نوع التأمين',
        ];
    }

}
