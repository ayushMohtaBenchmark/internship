<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblopportunity".
 *
 * @property int $opportunity_id
 * @property int|null $lead_id
 * @property int|null $plan_id
 * @property string $create_date
 *
 * @property Tbllead $lead
 * @property Tblplan $plan
 */
class Opportunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblopportunity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lead_id', 'plan_id'], 'integer'],
            [['create_date'], 'safe'],
            [['lead_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lead::className(), 'targetAttribute' => ['lead_id' => 'lead_id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'plan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'opportunity_id' => 'Opportunity ID',
            'lead_id' => 'Lead ID',
            'plan_id' => 'Plan ID',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[Lead]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLead()
    {
        return $this->hasOne(Lead::className(), ['lead_id' => 'lead_id']);
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery
     */
     public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }
}