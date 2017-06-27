<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $man
 * @property string $adefaultASD
 * @property string $adefaultASD_NULL
 * @property string $bdefaultTIME_create
 * @property string $bdefaultTIME_create_update
 * @property string $bTIMENOTnul
 * @property string $bTIMENULL
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bdefaultTIME_create', 'bdefaultTIME_create_update', 'bTIMENOTnul', 'bTIMENULL'], 'safe'],
            [['adefaultASD', 'adefaultASD_NULL'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'man' => 'Man',
            'adefaultASD' => 'Adefault Asd',
            'adefaultASD_NULL' => 'Adefault Asd  Null',
            'bdefaultTIME_create' => 'Bdefault Time Create',
            'bdefaultTIME_create_update' => 'Bdefault Time Create Update',
            'bTIMENOTnul' => 'B Timenotnul',
            'bTIMENULL' => 'B Timenull',
        ];
    }
}
