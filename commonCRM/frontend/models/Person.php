<?php

namespace frontend\models;

use Yii;

use yii\behaviors\TimestampBehavior;

use yii\db\Expression;

/**
 * This is the model class for table "tblperson".
 *
 * @property int $person_id
 * @property string $person_name
 * @property string $person_address
 * @property string $person_city
 * @property string $person_state
 * @property string $create_date
 *
 * @property Tbllead[] $tblleads
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblperson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_name', 'person_address', 'person_city', 'person_state'], 'required'],
            [['create_date'], 'safe'],
            [['person_name', 'person_city', 'person_state'], 'string', 'max' => 100],
            [['person_address'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'person_name' => 'Person Name',
            'person_address' => 'Person Address',
            'person_city' => 'Person City',
            'person_state' => 'Person State',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[Tblleads]].
     *
     * @return \yii\db\ActiveQuery
     */
     public function getPerson(){
        return $this->hasMany(Person::className(),['person_id'=>'id']);
    }

}
