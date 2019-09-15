<?php
use yii\db\Migration;
/**
 * Handles the creation of table `{{%comment}}`.
 */
class m190911_121429_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'body' => $this->string(255)->notNull(),
            'task_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_comment_task_id',
            'comment',
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
        $this->dropForeignKey('fk_comment_task_id', 'comment');
        $this->dropTable('comment');
    }
}