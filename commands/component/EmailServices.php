<?php
namespace commands/components;

use yii;
use yii\base\Component;
use commands\components\UserNotificationInterfaces;

class EmailService extends Component
{
	public function notifyUser(UserNotificationInterfaces$User)
	{
		return Yii::$app->mailer->compose()
		->setFrom('service.email@yii2frontend.com')
		->setTo($user->email)
		->setSubject()
		->send();
		
		
		
	}
	public function notifyAdmins()
	{
		return Yii::$app->mailer->compose()
		->setForm('service.email@yii2frontend.com')
		->setTo($user->email)
		->setSubject($subject)
		->sennd();
		
	}
}

?>
