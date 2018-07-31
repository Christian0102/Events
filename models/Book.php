<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;


class Book extends ActiveRecord
{
	
	
	public static function tableName()
	{
	
	return 'book';	
	}
		public function rules()
		{
			return [
			[['name','publisher_id'],'required'],
			[['date_published'],'date','format'=>'php:Y-m-d'],
				
			];
			
			
		}
		
		
	
		public static function getDB()
		{
		
		return Yii::$app->get('db2');
		}
		
}





?>
