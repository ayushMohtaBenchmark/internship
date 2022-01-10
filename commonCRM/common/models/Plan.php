<?php

namespace common\models;


use Yii;

use yii\behaviors\TimestampBehavior;

use yii\db\Expression;

/**
 * This is the model class for table "tblplan".
 *
 * @property int $plan_id
 * @property string|null $plan_name
 * @property string|null $plan_data
 * @property string|null $plan_price
 * @property string|null $plan_duration
 * @property string $create_date
 *
 * @property Tblopportunity[] $tblopportunities
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblplan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['plan_name', 'plan_data', 'plan_price', 'plan_duration'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_name' => 'Plan Name',
            'plan_data' => 'Plan Data',
            'plan_price' => 'Plan Price',
            'plan_duration' => 'Plan Duration',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[Tblopportunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblopportunity()
    {
        return $this->hasMany(Opportunity::className(), ['plan_id' => 'plan_id']);
    }
}
