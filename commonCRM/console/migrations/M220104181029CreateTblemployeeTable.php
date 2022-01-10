<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tblemployee}}`.
 */
class M220104181029CreateTblemployeeTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tblemployee}}', [
            'employee_id' => $this->primaryKey(),
            'person_id'=>$this->integer(),
            'create_date'=>$this->timestamp(),
        ]);
        $this->createIndex(
            'idx-tblemployee-person_id',
            'tblemployee',
            'person_id'
        );

        // add foreign key for table `employee`
        $this->addForeignKey('FK-employee-person','tblemployee','person_id','tblperson','person_id');
   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropForeignKey(
            'FK-Lead-person',
            'person_id'
        );

        $this->dropIndex(
            'idx-tblemployee-person_id',
            'tblperson'
        );

        $this->dropTable('{{%tblemployee}}');
    }
}
