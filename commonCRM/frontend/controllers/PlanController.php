<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Plan;
    use common\models\PlanSearch;

    class PlanController extends ActiveController
    {
        public $modelClass = 'common\models\PlanSearch';
        
        public function actions()
        {
            $actions = parent::actions();
            unset($actions['index']);
            unset($actions['create']);   
            unset($actions['delete']);
            unset($actions['update']);
        }
        
        public function actionIndex()
        {
             $searchModel = new PlanSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Plan::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $plan = new Plan();
             $plan->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $plan->plan_name;
            //  die;
                if ($plan->plan_name=='') 
                {
                    return "Plan Name should not be empty";   
                }
                else if($plan->plan_duration=='')
                {
                    return "Plan Duration should not be empty";   
                }
                else if($plan->plan_data=='')
                {
                    return "Plan Data should not be empty";   
                }
                else if($plan->plan_price=='')
                {
                    return "Plan Price should not be empty";   
                }
                $plan->save();
                    return $plan;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $plan = Plan::findOne($id)->delete();
            if($plan) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            echo $plan_id;
            die;
            $plan = Plan::findOne($id);

            if($plan->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $plan->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>