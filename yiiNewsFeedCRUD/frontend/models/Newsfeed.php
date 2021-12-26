<?php 

    namespace app\models;

    use Yii;

    class Newsfeed extends \yii\db\ActiveRecord {
        public function rules() {
            return [
                [['title', 'description', 'author_name', 'author_email'],'required'],
                [['title', 'description', 'author_name', 'author_email'],'string','max' => 255]
            ];
        }

        public function attributeLabels(){
            return[
                'id' => 'ID',
                'title' => 'Title',
                'description' => 'Description',
                'author_name' => 'Author Name',
                'author_email' => 'Author Email',
            ];
        }   
    }

?>