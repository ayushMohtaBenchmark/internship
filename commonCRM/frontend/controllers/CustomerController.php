<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Customer;
    use common\models\CustomerSearch;
    use common\models\Plan;

    class CustomerController extends ActiveController
    {
        public $modelClass = 'common\models\CustomerSearch';
        
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
            $searchModel = new CustomerSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Customer::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $customer = new Customer();
             $customer->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $customer->customer_name;
            //  die;
                if ($customer->person_id=='') 
                {
                    return "Person id should not be empty";   
                }
                $customer->save();
                    return $customer;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $customer = Customer::findOne($id)->delete();
            if($customer) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            // echo $customer_id;
            // die;
            $customer = Customer::findOne($id);

            if($customer->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $customer->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>