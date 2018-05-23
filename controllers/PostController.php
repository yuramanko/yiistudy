<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.03.2016
 * Time: 21:17
 */

namespace app\controllers;

use Yii;

class PostController extends AppController{

    public $layout = 'basic';

    public function actionIndex(){
        if( Yii::$app->request->isAjax ){
            debug($_GET);
            return 'test';
        }
        return $this->render('test');
    }

    public function actionShow(){
//        $this->layout = 'basic';
        return $this->render('show');
    }

} 