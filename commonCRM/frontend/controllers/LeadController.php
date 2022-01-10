<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Lead;
    use common\models\LeadSearch;
    use common\models\Opportunity;
    use common\models\Plan;

    class LeadController extends ActiveController
    {
        public $modelClass = 'common\models\LeadSearch';
        
        public function actions()
        {
            $actions = parent::actions();
            unset($actions['index']);
            unset($actions['create']);   
            unset($actions['delete']);
            unset($actions['update']);
        }

        public function actionConvert($id)
        {
            // echo $id;
            // die;
            try {
                $opportunity = new Opportunity();
                $opportunity->load(Yii::$app->getRequest()->getBodyParams(),'');
                $opportunity->lead_id = $id;
                if($opportunity->save())
                {
                    return "Inserted Successfully";
                }
                // print_r($opportunity);
                // die;
            } catch (\yii\db\Exception $e) {
                return $e->getMessage();
            }
            // return $opportunity;

            // $dataProvider = $searchModel->search($this->request->queryParams);
  
            // return $dataProvider;
            // // print_r($filter);
            // // return $filter;
            // // return Lead::find()->orderBy($sort)->all();
        }

        public function actionIndex()
        {
            $searchModel = new LeadSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Lead::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $lead = new Lead();
             $lead->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $Lead->Lead_name;
            //  die;
                if ($lead->person_id=='') 
                {
                    return "Person id should not be empty";   
                }
                $lead->save();
                    return $lead;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $lead = Lead::findOne($id)->delete();
            if($lead) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            // echo $lead_id;
            // die;
            $lead = Lead::findOne($id);

            if($lead->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $lead->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>