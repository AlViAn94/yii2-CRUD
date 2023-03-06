<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Class CategoryController
 * @package frontend\controllers
 */
class CategoryController extends Controller{

    /**
     * @return string
     */
    public function actionIndex(){
        return 'You are on page Category/index!';
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id){
        return 'You are on page Category/View, id:' . $id;
    }
}