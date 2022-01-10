<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Person;
use yii\data\ActiveDataFilter;

class PersonSearch extends Person
{
    /**
     * {@inheritdoc}
     */
 
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['person_name', 'person_address', 'person_city', 'person_state'], 'safe'],
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
            'searchModel' => 'common\models\PersonFilter'
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
        
        $query = Person::find();
       
    
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }
      // echo  $query->createCommand()->rawSql;
        //die;
        
        return new ActiveDataProvider([
            'query' => $query,
        ]);
       
        
/*
     if ($filterCondition !== null) {
        $query->andWhere($filterCondition);
    }*/
 
 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'person_id',
                'person_name',
                'person_address',
                'person_city',
                'person_state',
                ],
        ]);

        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'person_id' => $this->person_id,
            'person_name' => $this->person_name,
            'person_address' => $this->person_address,
            'person_city' => $this->person_city,
            'person_state' => $this->person_state,

        ]);

        $query->andFilterWhere(['like', 'person_name', $this->person_name]);

        return $dataProvider;
    }

}