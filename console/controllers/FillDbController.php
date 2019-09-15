<?php

namespace console\controllers;
use common\models\TaskPriority;
use common\models\TaskStatus;
use yii\console\Controller;
class FillDbController extends Controller
{
    public function actionIndex()
    {
        foreach (TaskStatus::statusName() as $id => $title) {
            $taskStatus = TaskStatus::findOne($id);
            if (!isset($taskStatus)) {
                $taskStatus = new TaskStatus();
                $taskStatus->id = $id;
            }
            $taskStatus->title = $title;
            if ($taskStatus->save()) {
                echo "status.id={$id} with title={$title} is created \r\n";
            } else {
                var_dump($taskStatus->id);
                var_dump($taskStatus->errors);
                die();
            }
        }
        foreach (TaskPriority::getPriorityName() as $id => $title) {
            $taskPriority = TaskPriority::findOne($id);
            if (!isset($taskPriority)) {
                $taskPriority = new TaskPriority();
                $taskPriority->id = $id;
            }
            $taskPriority->title = $title;
            if ($taskPriority->save()) {
                echo "TaskPriority.id={$id} with title={$title} is created \r\n";
            } else {
                var_dump($taskPriority->id);
                var_dump($taskPriority->errors);
                die();
            }
        }
    }
}
