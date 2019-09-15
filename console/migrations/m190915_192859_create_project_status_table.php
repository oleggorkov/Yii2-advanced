<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%project_status}}`.
 */
class m190913_085342_create_project_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_status', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->addForeignKey(
            'fk_project_status_status_id',
            'project',
            'project_status_id',
            'project_status',
            'id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_project_status_status_id', 'project');
        $this->dropTable('project_status');
    }
}