<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Newsfeed;

class NewsfeedController extends \yii\web\Controller
{
    public function actionIndex() {
        $query = Newsfeed::find()->addOrderBy('id');

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize'=>5],
            'query' => $query,
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate() {
        $newsfeed = new Newsfeed();
        if ($newsfeed->load(Yii::$app->request->post())) {
            if ($newsfeed->validate()) {
                $newsfeed->save();
                return $this->redirect('index.php?r=newsfeed');
            }
        }
        return $this->render('create', ['newsfeed' => $newsfeed]);
    }

    public function actionUpdate($id) {
        $newsfeed = Newsfeed::findOne($id);
        if($newsfeed->load(Yii::$app->request->post()) && $newsfeed->save()) {
          return $this->redirect(['index', 'id' => $newsfeed->id]);
        }
        return $this->render('update',['newsfeed'=>$newsfeed]);
    }

    public function actionDelete($id){
        $newsfeed = Newsfeed::findOne($id)->delete();
        if($newsfeed) {
          return $this->redirect(['index']);
        }
    }

}
