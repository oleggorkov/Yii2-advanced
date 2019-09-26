<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $title
 * @property int $task_id
 *
 * @property Task $task
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'task_id'], 'required'],
            [['task_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::class, 'targetAttribute' => ['task_id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID тэга',
            'title' => 'Тэг',
            'task_id' => 'ID задачи',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::class, ['id' => 'task_id']);
    }
}
