<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%newsfeed}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $author_name
 * @property string|null $author_email
 */
class Newsfeed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%newsfeed}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['title', 'description', 'author_name', 'author_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'author_name' => 'Author Name',
            'author_email' => 'Author Email',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\NewsfeedQuery the active query used by this AR class.
     */
//     public static function find()
//     {
//         return new \common\models\query\NewsfeedQuery(get_called_class());
//     }
// }

}