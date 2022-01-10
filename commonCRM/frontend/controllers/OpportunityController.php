<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Person;
    use common\models\OpportunitySearch;
    use common\models\Opportunity;
    use common\models\Plan;

    class OpportunityController extends ActiveController
    {
        public $modelClass = 'common\models\OpportunitySearch';
        
        public function actions()
        {
            $actions = parent::actions();
            unset($actions['index']);
            unset($actions['create']);   
            unset($actions['delete']);
            unset($actions['update']);
        }

        // public function actionConvert($id)
        // {
        //     try {
        //         $opportunity = new Opportunity();
        //         $opportunity->load(Yii::$app->getRequest()->getBodyParams(),'');
        //         $opportunity->Opportunity_id = $id;
        //         $opportunity->save();
        //     } catch (\yii\db\Exception $e) {
        //         return $e->getMessage();
        //     }
        //     // return $opportunity;

        //     // $dataProvider = $searchModel->search($this->request->queryParams);
  
        //     // return $dataProvider;
        //     // // print_r($filter);
        //     // // return $filter;
        //     // // return Opportunity::find()->orderBy($sort)->all();
        // }

        public function actionIndex()
        {
            $searchModel = new OpportunitySearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Opportunity::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $opportunity = new Opportunity();
             $opportunity->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $opportunity->opportunity_name;
            //  die;
                if ($opportunity->lead_id=='') 
                {
                    return "Lead id should not be empty";   
                }
                if ($opportunity->plan_id=='') 
                {
                    return "Plan id should not be empty";   
                }
                $opportunity->save();
                    return $opportunity;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $opportunity = Opportunity::findOne($id)->delete();
            if($opportunity) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            // echo $opportunity_id;
            // die;
            $opportunity = Opportunity::findOne($id);

            if($opportunity->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $opportunity->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>