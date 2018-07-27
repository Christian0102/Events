<?php

namespace app\models;

use Yii;

class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }
	public function rules()
	{
		return 
		[
		[['first_name','last_name'],'required'],
		[['first_name','last_name'],'string','max'=>25],
		[['birthdate'],'date','format'=>'php:Y-m-d'],
		[['rating'],'integer'],
		];
		
		
	}

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'rating' => 'Rating',
        ];
    }
    public static function getDB()
	{
		
		return Yii::$app->get('db2');
	}
}
