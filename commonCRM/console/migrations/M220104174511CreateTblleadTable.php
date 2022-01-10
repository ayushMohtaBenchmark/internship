<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbllead}}`.
 */
class M220104174511CreateTblleadTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbllead}}', [
            'lead_id' => $this->primaryKey(),
            'person_id'=>$this->integer(),
            'create_date'=>$this->timestamp(),
        ]);
        $this->createIndex(
            'idx-tbllead-person_id',
            'tbllead',
            'person_id'
        );

        // add foreign key for table `lead`
        $this->addForeignKey('FK-Lead-person','tbllead','person_id','tblperson','person_id');
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

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-tbllead-person_id',
            'tblperson'
        );


        $this->dropTable('{{%tbllead}}');
    }
}
