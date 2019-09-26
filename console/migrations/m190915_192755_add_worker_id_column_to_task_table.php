<?php

use yii\db\Migration;
/**
 * Handles adding columns to table `{{%task}}`.
 */
class m190911_150336_add_worker_id_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'worker_id', $this->integer());
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'worker_id');
    }
}
