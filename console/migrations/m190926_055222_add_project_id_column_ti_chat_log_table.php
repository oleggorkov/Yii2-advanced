<?php

use yii\db\Migration;

/**
 * Class m190926_055222_add_project_id_column_ti_chat_log_table
 */
class m190926_055222_add_project_id_column_ti_chat_log_table extends Migration
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
        echo "m190926_055222_add_project_id_column_ti_chat_log_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_055222_add_project_id_column_ti_chat_log_table cannot be reverted.\n";

        return false;
    }
    */
}
