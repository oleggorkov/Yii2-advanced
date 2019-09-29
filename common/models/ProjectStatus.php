<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "project_status".
 *
 * @property int $id
 * @property string $title
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Project[] $projects
 */
class ProjectStatus extends \yii\db\ActiveRecord
{
    const IN_PROGRESS_ID = 1;
    const IN_PLANNING_ID = 2;
    const FINISHED_ID = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_status';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID статуса проекта',
            'title' => 'Статус проекта',
            'created_at' => 'Создание статуса проекта',
            'updated_at' => 'Изменение статуса проекта',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class,
            ['project_status_id' => 'id']);
    }
    public static function getProjectStatusTitle()
    {
        return [
            self::IN_PROGRESS_ID => 'В работе',
            self::IN_PLANNING_ID => 'Планируется',
            self::FINISHED_ID => 'Завершён'
        ];
    }
}