<?php

namespace frontend\controllers;

use backend\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


/**
 *  Class NewsController
 * @package frontend\controllers
 */
class NewsController extends Controller{
    /**
     * @return string
     */
    public function actionIndex(){
        return 'You are on page News/index!';
    }

    /**
     * @param int $id
     * @return string
     */
    public function actionView($id){
        return 'You are on page News/View, id:' . $id;
    }
}