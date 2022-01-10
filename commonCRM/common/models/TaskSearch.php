<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Task;
use common\models\Employee;
use common\models\Person;
use yii\data\ActiveDataFilter;

class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    //public $genre_name;
    public $person_name;
    public $employee_id;
 
    public function rules()
    {
        return [
            [['task_id'], 'integer'],
            [['person_name'], 'string'],
            [['employee_id', 'create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
  

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $filter = new ActiveDataFilter([
            'searchModel' => 'common\models\TaskFilter'
        ]);
        
        $filterCondition = null;
        
        // You may load filters from any source. For example,
        // if you prefer JSON in request body,
        // use Yii::$app->request->getBodyParams() below:
        if ($filter->load(\Yii::$app->request->get())) { 
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }
        $this->load($params);
        $query = Task::find();
        $query->joinWith(['employee']);
        // $query->joinWith(['person']);

       
        // echo  $query->createCommand()->rawSql;
        // die;

    // print_r($filterCondition);
    // die;
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }
        
        // return new ActiveDataProvider([
        //     'query' => $query,
        // ]);
       
        
/*
     if ($filterCondition !== null) {
        $query->andWhere($filterCondition);
    }*/
 
 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'task_id',
                'employee_id',
                'create_date',
               ],
        ]);

        
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
// echo self::tableName();
// die;
        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'employee_id' => $this->employee_id,
            // 'person_id' => $this->person_id,
            'create_date' => $this->create_date,
        ]);

        // $query->andFilterWhere(['like', 'person_id', $this->person_id]);
//  echo  $query->createCommand()->rawSql;
//         die;
        return $dataProvider;
    }

    public function getEmployee() {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    // public function getPerson() {
    //     return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    // }

  
}