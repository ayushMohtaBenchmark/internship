<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;
    use common\models\Person;
    use common\models\PersonSearch;

    class PersonController extends ActiveController
    {
        public $modelClass = 'common\models\PersonSearch';
        
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
            $searchModel = new PersonSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;
            // print_r($filter);
            // return $filter;
            // return Person::find()->orderBy($sort)->all();
        }
        public function actionCreate()
        {
             $person = new Person();
             $person->load(Yii::$app->getRequest()->getBodyParams(),'');
            //  echo $Person->Person_name;
            //  die;
            // print_r($person);
            // die;
                if ($person->person_name=='') 
                {
                    return "Person Name should not be empty";   
                }
                else if($person->person_address=='')
                {
                    return "Person address should not be empty";   
                }
                else if($person->person_city=='')
                {
                    return "Person city should not be empty";   
                }
                else if($person->person_state=='')
                {
                    return "Person state should not be empty";   
                }
                $person->save();
                    return $person;
        }
        public function actionDelete($id)
        {
             //  echo $id;
            //  die;
        $person = Person::findOne($id)->delete();
            if($person) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
            // echo $person_id;
            // die;
            $person = Person::findOne($id);

            if($person->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $person->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>