<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%project}}`.
 */
class m190913_084809_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'project_status_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        $this->addForeignKey(
            'fk_project_user_id',
            'project',
            'user_id',
            'user',
            'id',
            'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_project_user_id', 'project');
        $this->dropTable('project');
    }
}