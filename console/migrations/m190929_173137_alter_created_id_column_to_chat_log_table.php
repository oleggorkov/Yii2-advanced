<?php

use yii\db\Migration;

/**
 * Class m190929_173137_alter_created_id_column_to_chat_log_table
 */
class m190929_173137_alter_created_id_column_to_chat_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190929_173137_alter_created_id_column_to_chat_log_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190929_173137_alter_created_id_column_to_chat_log_table cannot be reverted.\n";

        return false;
    }
    */
}
