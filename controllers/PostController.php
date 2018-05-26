<?php


namespace app\controllers;
use Yii;
use app\models\TestForm;
use app\models\Category;

class PostController extends AppController{

    public $layout = 'basic';

    public function beforeAction($action){
        if( $action->id == 'index' ){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex(){
        if( Yii::$app->request->isAjax ){
            debug(Yii::$app->request->post());
            return 'test';
        }

        $model = new TestForm();
        if( $model->load(Yii::$app->request->post()) ){
            if( $model->validate() ){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        

        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
    }

    public function actionShow(){
        $this->view->title = 'Одна статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where('parent = 691')->all();
//        $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//        $cats = Category::find()->asArray()->where(['like','title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=','id',695])->all();
//        $cats = Category::find()->asArray()->where(['<=','id',695])->limit(1)->all();
//        $cats = Category::find()->asArray()->where(['<=','id',695])->limit(1)->one();
//        $cats = Category::findOne(['parent' => 691]);
//        $cats = Category::findAll(['parent' => 691]);
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($query)->all();
//        $query = "SELECT * FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($query, [':search' => '%pp%'])->all();
//        $cats = Category::findOne(694);
//        $cats = Category::find()->with('products')->where('id=694')->all();
//        $cats = Category::find()->with('products')->where('id=694')->all();
//        
//        $cats = Category::find()->all(); // отложенная, ленивая
        $cats = Category::find()->with('products')->all();  //жадная

        return $this->render('show', compact('cats')); 
    }

}







































