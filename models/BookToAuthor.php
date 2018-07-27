<?php

namespace app\models;

use Yii;

class BookToAuthor extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'book_to_author';
    }

    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'author_id' => 'Author ID',
        ];
    }
    public static function getDB()
	{
		
		return Yii::$app->get('db2');
	}
}
?>
