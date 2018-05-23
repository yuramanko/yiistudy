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

    public function actionTest(){

        $names = ['Ivanov', 'Petrov', 'Sidorov'];

//        var_dump(Yii::$app);
//        $this->debug(Yii::$app);
        $this->debug($names);

        return $this->render('test');

    }

} 