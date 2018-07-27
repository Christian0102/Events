<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;


class Book extends ActiveRecord
{
	
	
	public function tablesName()
	{
	
	return '{{book}}';	
	}
		public function rules()
		{
			return [
			[['name','publisher_id'],'required'],
			[['date_published'],'date','format'=>'php:Y-m-d']
				
			];
			
			
		}
	
	public function getDatePublished()
	{
		
	return ($this->date_published) ? Yii::$app->formatter->asDate($this->date_published) : "Not Set";	
	}
	
	public function getPublisher()
	{
	return $this->hasOne(Publisher::className(),['id'=>'publisher_id'])->one();
			
	}
		
		public function getPublisherName()
		{
		if($publisher = $this->getPublisher())
			{
		
			echo $publisher->name;
			}	
			return "Not Set";
		} 
		
		public function getBookToAuthorRelations()
		{
		return $this->hasMany(BookToAuthor::className(),['book_id'=>'id']);	
		}
		public function getAuthors()
		{
		return $this->hasMany(Author::className(),['id'=>'author_id'])->via('bookToAuthorRelations')->all();		
		}
		
		public static function getDB()
	{
		
		return Yii::$app->get('db2');
	}
		
}





?>
