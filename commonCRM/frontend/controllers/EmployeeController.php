<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Employee;
    use common\models\EmployeeSearch;
    use common\models\Opportunity;

    class EmployeeController extends ActiveController
    {
        public $modelClass = 'common\models\EmployeeSearch';
        
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
            $searchModel = new EmployeeSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
        }

        public function actionCreate()
        {
             $employee = new Employee();
             $employee->load(Yii::$app->getRequest()->getBodyParams(),'');
                if ($employee->person_id=='') 
                {
                    return "Person id should not be empty";   
                }
                $employee->save();
                return $employee;
        }

        public function actionDelete($id)
        {
            $employee = Employee::findOne($id)->delete();
            if($employee) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }

        public function actionUpdate($id)
        {
            $employee = Employee::findOne($id);

            if($employee->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $employee->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>