<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lead;
use common\models\Person;
use yii\data\ActiveDataFilter;

class LeadSearch extends Lead
{
    /**
     * {@inheritdoc}
     */
    //public $genre_name;
    public $person_name;
 
    public function rules()
    {
        return [
            [['lead_id'], 'integer'],
            [['person_name'], 'string'],
            [['person_id', 'create_date', 'person_name'], 'safe'],
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
            'searchModel' => 'common\models\LeadFilter',
            'attributeMap' => [
                'person_id' => 'tblperson.person_id',
            ],
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
        $query = Lead::find();
        $query->joinWith(['person']);
       
    // print_r($filterCondition);
    // die;
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }
        // echo  $query->createCommand()->rawSql;
        // die;
        
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
                'lead_id',
                'create_date',
                'person_id',
                'person_name' => [
                    'asc' => ['person_name' => SORT_ASC],
                    'desc' => ['person_name' => SORT_DESC],
                    'label' => 'Person Name',
                    'default' => SORT_ASC
                ]],
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
            'lead_id' => $this->lead_id,
            'person_id' => $this->person_id,
            'create_date' => $this->create_date,
        ]);

        // $query->andFilterWhere(['like', 'person_id', $this->person_id]);
//  echo  $query->createCommand()->rawSql;
//         die;
        return $dataProvider;
    }

    public function getPerson() {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }


  
}