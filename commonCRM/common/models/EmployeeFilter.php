<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;
use common\models\Person;

class EmployeeFilter extends Employee
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
            [['employee_id'], 'integer'],
            [['person_name'], 'string'],
            [['person_id','create_date','person_name'], 'safe'],
        ];
    }
  
}