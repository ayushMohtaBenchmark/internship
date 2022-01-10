<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Opportunity;
use common\models\Person;
use common\models\Plan;

class OpportunityFilter extends Opportunity
{
    /**
     * {@inheritdoc}
     */
    public $person_name;
    public $person_id;
    public $plan_name;
    public $plan_id;
    public $create_date;
    
    public function rules()
    {
        return [
            [['opportunity_id'], 'integer'],
            [['person_name','plan_name'], 'string'],
            [['person_id','plan_id','plan_name','create_date','person_name','opportunity_id'], 'safe'],
        ];
    }
  
}