<?php

use yii\db\Migration;

/**
 * Class m190926_051845_rename_author_id_column_to_task__table
 */
class m190926_051845_rename_author_id_column_to_task__table extends Migration
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
        echo "m190926_051845_rename_author_id_column_to_task__table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_051845_rename_author_id_column_to_task__table cannot be reverted.\n";

        return false;
    }
    */
}
