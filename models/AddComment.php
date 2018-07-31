<?php
namespace app\models;

use yii\db\ActiveRecord;

class AddComment extends ActiveRecord
{
	public static function tableName()
	{
	return 'coment';	
	}
	public function getUser()
	{
		return $this->hasOne(User::ClassName(),['id'=>'author_id']);
	}
}




?>
