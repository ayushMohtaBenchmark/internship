<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tblplan}}`.
 */
class M220104180835CreateTblplanTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tblplan}}', [
            'plan_id' => $this->primaryKey(),
            'plan_name' => $this->string(),
            'plan_data' => $this->string(),
            'plan_price' => $this->string(),
            'plan_duration' => $this->string(),
            'create_date' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tblplan}}');
    }
}
