<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Task;
    use common\models\TaskSearch;


    class TaskController extends ActiveController
    {
        public $modelClass = 'common\models\TaskSearch';
        
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
            $searchModel = new TaskSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Lead::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $task = new Task();
             $task->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $Lead->Lead_name;
            //  die;
                if ($task->task_name=='') 
                {
                    return "Task Name should not be empty";   
                }
                if ($task->employee_id=='') 
                {
                    return "Employee id should not be empty";   
                }
                $task->save();
                    return $task;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $task = Task::findOne($id)->delete();
            if($task) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            // echo $lead_id;
            // die;
            $task = Task::findOne($id);

            if($task->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $task->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>