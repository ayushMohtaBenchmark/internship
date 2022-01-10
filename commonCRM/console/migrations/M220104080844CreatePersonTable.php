<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tblperson}}`.
 */
class M220104080844CreatePersonTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tblperson}}', [
            'person_id' => $this->primaryKey(),
            'person_name' => $this->string(),
            'person_address' => $this->string(500),
            'person_city' => $this->string(),
            'person_state' => $this->string(),
            'create_date'=>$this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tblperson}}');
    }
}
