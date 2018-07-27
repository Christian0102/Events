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
		[['comment'],'required'],
		[['comment'],'trim'],
		[['comment'],'string','min'=>10,'max'=>500],
		];
	}
	
	public function AddComment()
	{
		$email  = Yii::$app->user->identity->email;	
		if(isset($email))
		{
			$AddComment  = new AddComment();
			$AddComment->comment = $this->comment;
			$AddComment->user_name = $email;
			$AddComment->save();
		}
	} 
	
}



?>

