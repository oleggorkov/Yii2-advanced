<?php

use yii\db\Migration;

/**
 * Class m190926_051904_rename_author_id_column_to_project__table
 */
class m190926_051904_rename_author_id_column_to_project__table extends Migration
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
        echo "m190926_051904_rename_author_id_column_to_project__table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_051904_rename_author_id_column_to_project__table cannot be reverted.\n";

        return false;
    }
    */
}
