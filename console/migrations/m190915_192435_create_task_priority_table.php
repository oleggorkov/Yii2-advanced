<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%task_priority}}`.
 */
class m190911_120005_create_task_priority_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_priority', [
            'id' => $this->primaryKey(),
            'title' => $this->string(55)->notNull(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_priority');
    }
}