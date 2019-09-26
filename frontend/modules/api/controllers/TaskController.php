<?php

namespace frontend\modules\api\controllers;
use common\models\Task;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
class TaskController extends ActiveController
{
    public $modelClass = Task::class;
    public function actionRandom($count)
    {
        $output = [];
        $errors = [];
        \Yii::$app->db->beginTransaction();
        try {
            for ($i=0; $i<$count; $i++) {
                $task = new Task();
                $task->title = \Yii::$app->security->generateRandomString(3);
                $task->description = \Yii::$app->security->generateRandomString(3);
                $task->author_id = 1;
                $task->worker_id = 3;
                $task->status_id = 1;
                $task->priority_id = 1;
                if ($task->save()) {
                    $output[$i] = $task->attributes;
                } else {
                    $errors[$i] = $task->errors;
                }
            }
            $result = empty($errors);
            if ($result === true) {
                \Yii::$app->db->transaction->commit();
            } else {
                \Yii::$app->db->transaction->rollBack();
            }
            return ['result' => empty($errors), 'errors' => $errors, 'output' => $output];
        } catch (\Throwable $exception) {
            \Yii::$app->db->transaction->rollBack();
            return ['result' => false, 'error_message' => $exception->getMessage()];
        }
    }
//    public function actionIndex()
//    {
//        $provider = new ActiveDataProvider([
//            'query' => Task::find(),
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//        ]);
//        return $tasks = $provider->getModels();
//    }
}
