<?php

namespace app\controllers;
use Yii;
use app\models\Signup;
use app\models\Login;
use yii\web\Controller;
use app\models\AddComment;
use app\models\Comment;
class SiteController extends Controller
{

	public function actionIndex()
	{
		if(Yii::$app->user->isGuest)
		{
			return $this->redirect('login');
		}
		    $comment = AddComment::find()		    
		    ->joinWith('user')->all(); 
		
		
		$model = new Comment();
		if($model->load(Yii::$app->request->post() ) && $model->validate() )
		{
			$model->AddComment();
			return $this->refresh();
		}
		return $this->render('index',['model'=>$model,'coment'=>$comment]);
	}	
		public function actionSignup()
		{
		
		$model = new Signup();
		
			if($model->load(Yii::$app->request->post())&&$model->validate())
			{	if($model->signup())
				{
				Yii::$app->session->setFlash('success','You are registered');
				return $this->goHome();	
				}
			
			}
			
			
		return $this->render('signup',['model'=>$model]);
		}
	
	public function actionLogin()
	{	
		if(!Yii::$app->user->isGuest)
		{
			return $this->goHome();
		}
		$model = new Login();
		if($model->load(Yii::$app->request->post())&&$model->validate())
		{		
				Yii::$app->user->login($model->getUser());
				$email = Yii::$app->user->identity->email;
				Yii::$app->session->setFlash('info','Welcome '.$email);

				return $this->redirect('index');

		}
			
		
		return $this->render('login',['model'=>$model]);
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->goHome();
	}
	
}
