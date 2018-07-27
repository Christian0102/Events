<?php
namespace app\models;

use yii\base\Model;
class Signup extends Model
{
	public $email;
	public $password;
	
	public function rules()
	{
		return[
			[['email','password'],'required'],
			[['email'],'email'],
			['email','unique','targetClass'=>'app\models\User'],
			['password','string','min'=>7,'max'=>21],
		
		];
	}
	public function signup()
	{
		$user = new User();
		$user->email = $this->email;
		$user->password = sha1($this->password);
		return $user->save();
	}
	
	
}






?>
