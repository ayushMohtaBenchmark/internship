<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbltask}}`.
 */
class M220105064947CreateTbltaskTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('{{%tbltask}}', [
           'task_id' => $this->primaryKey(),
           'task_name' => $this->string(),
           'employee_id'=>$this->integer(),
           'create_date' => $this->timestamp(),
       ]);
       $this->createIndex(
           'idx-tblotask-employee_id',
           'tbltask',
           'employee_id'
       );
 
       // add foreign key for table `task'
       $this->addForeignKey('fk-tbltask-employee_id','tbltask','employee_id','tblemployee','employee_id');
   }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
           'fk-tbltask-employee_id',
           'employee_id'
       );
 
       // drops index for column `post_id`
       $this->dropIndex(
           'idx-tbltask-employee_id',
           'tblemployee'
       );
      
       $this->dropTable('{{%tbltask}}');
    }
}
