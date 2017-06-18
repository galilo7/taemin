<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $phone1
 * @property string $phone2
 * @property string $address
 * @property string $email
 * @property string $website
 * @property string $type
 * @property string $reprisentative_name
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AvailableTaemin[] $availableTaemins
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone1', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'reprisentative_name'], 'string', 'max' => 200],
            [['phone1', 'phone2'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 250],
            [['email', 'type'], 'string', 'max' => 100],
            [['website'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('companies', 'ID'),
            'name' => Yii::t('companies', 'Name'),
            'description' => Yii::t('companies', 'Description'),
            'phone1' => Yii::t('companies', 'Phone1'),
            'phone2' => Yii::t('companies', 'Phone2'),
            'address' => Yii::t('companies', 'Address'),
            'email' => Yii::t('companies', 'Email'),
            'website' => Yii::t('companies', 'Website'),
            'type' => Yii::t('companies', 'Type'),
            'reprisentative_name' => Yii::t('companies', 'Reprisentative Name'),
            'created_at' => Yii::t('companies', 'Created At'),
            'updated_at' => Yii::t('companies', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvailableTaemins()
    {
        return $this->hasMany(AvailableTaemin::className(), ['r_company' => 'id']);
    }
}
