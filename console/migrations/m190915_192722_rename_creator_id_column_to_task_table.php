<?php

use yii\db\Migration;
/**
 * Class m190911_145044_rename_creator_id_column_to_task_table
 */
class m190911_145044_rename_creator_id_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('task', 'author_id', 'creator_id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('task', 'creator_id', 'author_id');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
    }
    public function down()
    {
        echo "m190911_145044_rename_creator_id_column_to_task_table cannot be reverted.\n";
        return false;
    }
    */
}