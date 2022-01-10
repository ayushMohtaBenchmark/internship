<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tblopportunity}}`.
 */
class M220104182518CreateTblopportunityTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tblopportunity}}', [
            'opportunity_id' => $this->primaryKey(),
            'lead_id'=>$this->integer(),
            'plan_id'=>$this->integer(),
            'create_date'=>$this->timestamp(),
        ]);
        $this->createIndex(
            'idx-tblopportunity-lead_id',
            'tblopportunity',
            'lead_id'
        );

        // add foreign key for table `lead`
        $this->addForeignKey('fk-tblopportunity-lead_id','tblopportunity','lead_id','tbllead','lead_id');

        $this->createIndex(
            'idx-tblopportunity-plan_id',
            'tblopportunity',
            'plan_id'
        );

        // add foreign key for table `lead`
        $this->addForeignKey('fk-tblopportunity-plan_id','tblopportunity','plan_id','tblplan','plan_id');
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-tblopportunity-lead_id',
            'lead_id'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-tblopportunity-lead_id',
            'tbllead'
        );

        $this->dropForeignKey(
            'fk-tblopportunity-plan_id',
            'plan_id'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-tblopportunity-plan_id',
            'tblplan'
        );

        $this->dropTable('{{%tblopportunity}}');
    }
}
