<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%newsfeed}}`.
 */
class m220104_172513_create_newsfeed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%newsfeed}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'author_name' => $this->string(255),
            'author_email' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%newsfeed}}');
    }
}
