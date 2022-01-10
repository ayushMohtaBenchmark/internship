<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lead;
use common\models\Person;

class LeadFilter extends Lead
{
    /**
     * {@inheritdoc}
     */
    public $person_name;
    public $person_id;
    public $create_date;
    
    public function rules()
    {
        return [
            [['lead_id'], 'integer'],
            [['person_name'], 'string'],
            [['person_id','create_date','person_name'], 'safe'],
        ];
    }
  
}