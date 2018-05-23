<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 13.03.2016
 * Time: 13:05
 */

namespace app\controllers\admin;

use yii\web\Controller;

class UserController extends Controller{

    public function actionIndex(){
        return $this->render('index');
    }

} 