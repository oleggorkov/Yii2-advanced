<?php

namespace common\models;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "chat_log".
 *
 * @property int $id
 * @property string $username
 * @property string $message
 * @property string $created_at
 */
class ChatLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_log';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'message', 'created_at'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            'class' => TimestampBehavior::class,
            'createdAtAttribute' => 'created_at',
            'value' => time(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Пользователь',
            'message' => 'Сообщение',
            'created_at' => 'Создано',
        ];
    }
    public static function saveLog(string $msg)
    {
        try {
            $model = new self(json_decode($msg, true));
            $model->created_at = time();
            $model->save();
        } catch (\Throwable $exception) {
            Yii::error($exception->getMessage());
        }
    }
    public  static function sendChat(string $msg)
    {
        try {
            $model = new self();
            $model->username = Yii::$app->user->identity->username;
            $model->message = $msg;
            $model->created_at = time();
            $model->save();
        } catch (\Throwable $exception) {
            Yii::error($exception->getMessage());
        }
    }
}
