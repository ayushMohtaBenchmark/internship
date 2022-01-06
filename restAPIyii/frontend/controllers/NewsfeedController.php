<?php

namespace frontend\controllers;

use common\models\Newsfeed;
use yii\rest\ActiveController;

class NewsfeedController extends ActiveController {
    public $modelClass = Newsfeed::class;
}