<?php

namespace app\controllers;
use yii;
use app\models\Author;
class BookShopController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }
	public function actionCreate()
	{
		$model = new Author();
		
		return $this->render('create',['model'=>$model]);
	}
    public function actionIndex()
    {	
		$authors = Author::find()->all();
		
			return $this->render('index',['authors'=>$authors]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
