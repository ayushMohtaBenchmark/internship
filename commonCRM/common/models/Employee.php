<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tblemployee}}".
 *
 * @property int $employee_id
 * @property int|null $person_id
 * @property string $create_date
 *
 * @property Tblperson $person
 * @property Tbltask[] $tbltasks
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblemployee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['create_date', 'person_id'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblperson::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'person_id' => 'Person ID',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Tblperson::className(), ['person_id' => 'person_id']);
    }

    /**
     * Gets query for [[Tbltasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbltasks()
    {
        return $this->hasMany(Tbltask::className(), ['employee_id' => 'employee_id']);
    }
}
