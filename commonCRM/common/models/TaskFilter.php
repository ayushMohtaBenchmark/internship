<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;
use common\models\Task;
use common\models\Person;

class TaskFilter extends Task
{
    /**
     * {@inheritdoc}
     */
    public $person_name;
    public $employee_id;
    public $create_date;
    
    public function rules()
    {
        return [
            [['lead_id'], 'integer'],
            [['person_name'], 'string'],
            [['employee_id','person_id','create_date','person_name'], 'safe'],
        ];
    }
  
}