<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%task}}`.
 */
class m190911_110156_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(55)->notNull(),
            'description' => $this->text()->notNull(),
            'author_id' => $this->integer(),
            'deadLine_date' => $this->integer(),
            'start_date' => $this->integer(),
            'end_date' => $this->integer(),
            'status_id' => $this->integer()->notNull(),
            'priority_id' => $this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_task_user_id',
            'task',
            'author_id',
            'user',
            'id',
            'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_task_user_id', 'task');
        $this->dropTable('task');
    }
}