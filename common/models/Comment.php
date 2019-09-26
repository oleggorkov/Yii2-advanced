<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $body
 * @property int $task_id
 *
 * @property Task $task
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body', 'task_id'], 'required'],
            [['task_id'], 'integer'],
            [['body'], 'string', 'max' => 255],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::class, 'targetAttribute' => ['task_id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID комментария',
            'body' => 'Комментарий',
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
