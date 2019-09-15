<?php

use yii\db\Migration;
/**
 * Class m190911_120654_add_fk_priority_id_to_task_table
 */
class m190911_120654_add_fk_priority_id_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_task_priority_id',
            'task',
            'priority_id',
            'task_priority',
            'id',
            'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_task_priority_id', 'task_priority');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
    }
    public function down()
    {
        echo "m190911_120654_add_fk_priority_id_to_task_table cannot be reverted.\n";
        return false;
    }
    */
}