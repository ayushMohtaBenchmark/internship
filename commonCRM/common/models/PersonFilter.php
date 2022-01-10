<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Person;

class PersonFilter extends Person
{
    /**
     * {@inheritdoc}
     */
    public $person_id;
    public $person_name;
    public $person_address;
    public $person_city;
    public $person_state;
    
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['person_name','person_address','person_state','person_city'], 'safe'],
        ];
    }
  
}
