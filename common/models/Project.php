<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property int $project_status_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ProjectStatus $projectStatus
 * @property User $user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'project_status_id'], 'required'],
            [['user_id', 'project_status_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['project_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectStatus::className(), 'targetAttribute' => ['project_status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID проекта',
            'title' => 'Проект',
            'user_id' => 'ID пользователя',
            'project_status_id' => 'ID статуса проекта',
            'created_at' => 'Создание проекта',
            'updated_at' => 'Изменение проекта',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectStatus()
    {
        return $this->hasOne(ProjectStatus::class,
            ['id' => 'project_status_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class,
            ['id' => 'user_id']);
    }
}
