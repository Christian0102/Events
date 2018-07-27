<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

class Login extends Model
{
	public $email;
	public $password;
	public function rules()
	{
		return[
			[['email','password'],'required'],
			['email','email'],
			[['password'],'validatePassword'],
		
		];
	}
	public function validatePassword($attribute,$params)
	{
		if(!$this->hasErrors())//Daca nu sunt errori controlam parola
			{
			$user = $this->getUser(); 
				if(!$user || !$user->validatePassword($this->password))
				{
				$this->addError($attribute,'Incorect Password or Login');	
				}
			}
	}
	
	public function getUser()
	{
		return User::findOne(['email'=>$this->email]);

	}
	
}


?>
