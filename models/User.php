<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	public static function tableName()
	{
		
		return 'user';
	}
	
		public function setPassword($password)
		{
			return $this->password = sha1($password);
		}
		public function validatePassword($password)
		{
			return $this->password === sha1($password);
		}
	//Indentity Interfaces Methods
		public static function findIdentity($id)
		{
			return self::findOne($id);
		}

		public static function findIdentityByAccessToken($token, $type = null)
		{
			return true;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getAuthKey()
		{
			return true;
		}

		public function validateAuthKey($authKey)
		{
			return true;
		}
} 


















