<?php

namespace app\controllers;
use yii;
use app\models\Book;
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
		$book = new Book();
		if($book->load(Yii::$app->request->post()) && $book->save())
		{
			Yii::$app->session->setFlash('success','Saved');
		}
		
		return $this->render('create',['book'=>$book]);
	}
    public function actionIndex()
    {	
				
			$book = new Book();
			//$book->name = 'The game';
			//$book->isbn = '23455345323232';
			$book->save();
			return $this->render('index');
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
