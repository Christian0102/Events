<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\AddComment;
class Comment extends Model
{
	public $comment;
	
	public function rules()
	{
		return
		[
		[['comment','reCaptcha'],'required'],
		[['comment'],'trim'],
		[['comment'],'string','min'=>10,'max'=>500],
		['reCaptcha', \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LeTXQgUAAAAALExcpzgCxWdnWjJcPDoMfK3oKGi'],
		];
	}
	
	
	
	public function AddComment()
	{
		$author_id  = Yii::$app->user->identity->id;
		$user_name = Yii::$app->user->identity->email;
		if(isset($author_id)){
		$object = new AddComment();
		$object->author_id = $author_id;
		$object->user_name  = $user_name;
		$object->comment = $this->comment;
		return $object->save();
	} 
		
	}
	public function attributeLabels()
 
   {
 
       return [
 
           'reCaptcha' => '',
 
       ];
 
   }	
	
}



?>

