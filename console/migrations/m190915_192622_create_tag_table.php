<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%tag}}`.
 */
class m190911_120950_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'task_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_tag_task_id',
            'tag',
            'task_id',
            'task',
            'id',
            'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tag_task_id', 'tag');
        $this->dropTable('tag');
    }
}
