<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Opportunity;
use common\models\Lead;
use common\models\Plan;
use yii\data\ActiveDataFilter;

class OpportunitySearch extends Opportunity
{
    /**
     * {@inheritdoc}
     */
    //public $genre_name;
    public $plan_name;
    public function rules()
    {
        return [
            [['opportunity_id'], 'integer'],
            [['plan_name'], 'string'],
            [['lead_id','plan_id','plan_name','create_date','opportunity_id'], 'safe'],
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
            'searchModel' => 'common\models\OpportunityFilter'
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
        $query = Opportunity::find();
        $query->joinWith(['lead']);
        $query->joinWith(['plan']);

       
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
                'opportunity_id',
                'plan_id',
                'create_date',
                'lead_id',
                'plan_name' => [
                    'asc' => ['plan_name' => SORT_ASC],
                    'desc' => ['plan_name' => SORT_DESC],
                    'label' => 'Plan Name',
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
            'opportunity_id' => $this->opportunity_id,
            'plan_id' => $this->plan_id,
            'create_date' => $this->create_date,
        ]);

        // $query->andFilterWhere(['like', 'person_id', $this->person_id]);
//  echo  $query->createCommand()->rawSql;
//         die;
        return $dataProvider;
    }

    public function getLead() {
        return $this->hasOne(Lead::className(), ['lead_id' => 'lead_id']);
    }
     public function getPlan() {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }
}