<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tblcustomer}}`.
 */
class M220105071046CreateTblcustomerTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tblcustomer}}', [
            'customer_id' => $this->primaryKey(),
            'person_id'=>$this->integer(),
            'create_date'=>$this->timestamp(),
        ]);
        $this->createIndex(
            'idx-tblperson-person_id',
            'tblperson',
            'person_id'
        );

        // add foreign key for table `person`
        $this->addForeignKey('fk-tblperson-person_id','tblcustomer','person_id','tblperson','person_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-tblcustomer-person_id',
            'person_id'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-tblcustomer-person_id',
            'tblperson'
        );
        $this->dropTable('{{%tblcustomer}}');
    }
}
