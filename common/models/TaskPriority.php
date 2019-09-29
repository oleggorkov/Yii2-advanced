<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "task_priority".
 *
 * @property int $id
 * @property string $title
 *
 * @property Task[] $tasks
 */
class TaskPriority extends \yii\db\ActiveRecord
{
    const LOW_ID = 1;
    const MEDIUM_ID = 2;
    const HIGH_ID = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_priority';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 55],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID приоритета',
            'title' => 'Приоритет',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['priority_id' => 'id']);
    }
    public static function getPriorityTitle()
    {
        return [
            self::LOW_ID => 'Низкий',
            self::MEDIUM_ID => 'Средний',
            self::HIGH_ID => 'Высокий',
        ];
    }
}