<?php

use yii\db\Migration;

/**
 * Class m190926_052017_add_fk_project_id_to_task_table
 */
class m190926_052017_add_fk_project_id_to_task_table extends Migration
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
        echo "m190926_052017_add_fk_project_id_to_task_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_052017_add_fk_project_id_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
