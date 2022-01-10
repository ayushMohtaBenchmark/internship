<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tblperson}}".
 *
 * @property int $person_id
 * @property string|null $person_name
 * @property string|null $person_address
 * @property string|null $person_city
 * @property string|null $person_state
 * @property string $create_date
 *
 * @property Tblcustomer[] $tblcustomers
 * @property Tblemployee[] $tblemployees
 * @property Tbllead[] $tblleads
 */
class Tblperson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tblperson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['person_name', 'person_city', 'person_state'], 'string', 'max' => 255],
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
     * Gets query for [[Tblcustomers]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblcustomerQuery
     */
    public function getTblcustomers()
    {
        return $this->hasMany(Tblcustomer::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Tblemployees]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblemployeeQuery
     */
    public function getTblemployees()
    {
        return $this->hasMany(Tblemployee::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Tblleads]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TblleadQuery
     */
    public function getTblleads()
    {
        return $this->hasMany(Tbllead::className(), ['person_id' => 'person_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TblpersonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TblpersonQuery(get_called_class());
    }
}
