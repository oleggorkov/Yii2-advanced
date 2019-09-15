<?php

namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $creator_id
 * @property int $worker_id
 * @property int $deadLine_date
 * @property int $start_date
 * @property int $end_date
 * @property int $status_id
 * @property int $priority_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Comment[] $comments
 * @property Tag[] $tags
 * @property TaskPriority $priority
 * @property TaskStatus $status
 * @property User $creator
 * @property User $worker
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'status_id', 'priority_id', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['creator_id', 'worker_id', 'deadLine_date', 'start_date', 'end_date', 'status_id', 'priority_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 55],
            [['priority_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskPriority::class, 'targetAttribute' => ['priority_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatus::class, 'targetAttribute' => ['status_id' => 'id']],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['creator_id' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID задачи',
            'title' => 'Задача',
            'description' => 'Описание',
            'creator_id' => 'Создатель',
            'worker_id' => 'Исполнитель',
            'deadLine_date' => 'Выполнить до',
            'start_date' => 'Начало',
            'end_date' => 'Окончание',
            'status_id' => 'Статус',
            'priority_id' => 'Приоритет',
            'created_at' => 'Создана',
            'updated_at' => 'Изменение',
        ];
    }
    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    'value' => time(),
                ],
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class,
            [
                'task_id' => 'id'
            ]);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class,
            ['task_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriority()
    {
        return $this->hasOne(TaskPriority::class,
            ['id' => 'priority_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(TaskStatus::class,
            ['id' => 'status_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::class,
            ['id' => 'creator_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(User::class,
            ['id' => 'worker_id']);
    }
    public function fields()
    {
        $parentFields =  parent::fields();
        $modelFields = [
            'created_at'=> function(){
                if (isset($this->created_at)){
                    return Yii::$app->formatter->asDatetime($this->created_at);
                }
                return null;
            }
        ];
        return array_merge($parentFields, $modelFields);
    }
}
