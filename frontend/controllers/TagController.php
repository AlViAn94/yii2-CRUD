<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Class TagController
 * @package frontend\controllers
 */
class TagController extends Controller{
    /**
     * @return string
     */
    public function actionIndex(){
        return 'You are on page Tag/index!';
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id){
        return 'You are on page Tag/View, id:' . $id;
    }
}