<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "task_status".
 *
 * @property int $id
 * @property string $title
 *
 * @property Task[] $tasks
 */
class TaskStatus extends \yii\db\ActiveRecord
{
    const NEW_ID = 1;
    const IN_PROGRESS_ID = 2;
    const ON_TESTING_ID = 3;
    const READY_ID = 4;
    const ARCHIVE_ID = 5;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_status';
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
            'id' => 'ID статуса',
            'title' => 'Статус',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['status_id' => 'id']);
    }
    public static function statusName()
    {
        return [
            self::NEW_ID => 'Новая',
            self::IN_PROGRESS_ID => 'В работе',
            self::ON_TESTING_ID => 'В тестировании',
            self::READY_ID => 'Готово',
            self::ARCHIVE_ID => 'Архивная',
        ];
    }
}
