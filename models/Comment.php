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
		$author_id  = Yii::$app->user->identity->id;
		if(isset($author_id)){
		$object = new AddComment();
		$object->author_id = $author_id;
		$object->comment = $this->comment;
		return $object->save();
	} 
		
	}	
	
}



?>

