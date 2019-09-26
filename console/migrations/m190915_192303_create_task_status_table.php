<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%task_status}}`.
 */
class m190911_115444_create_task_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_status', [
            'id' => $this->primaryKey(),
            'title' => $this->string(55)->notNull(),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_status');
    }
}
