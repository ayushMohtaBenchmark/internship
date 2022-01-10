<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Plan;

class PlanFilter extends Plan
{
    /**
     * {@inheritdoc}
     */
    public $plan_id;
    public $plan_name;
    public $plan_duration;
    public $plan_price;
    public $plan_data;
    
    public function rules()
    {
        return [
            [['plan_id'], 'integer'],
            [['plan_name','plan_duration','plan_data','plan_price'], 'safe'],
        ];
    }
  
}
