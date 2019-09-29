<?php

namespace console\controllers;
use common\models\ProjectStatus;
use common\models\TaskPriority;
use common\models\TaskStatus;
use yii\console\Controller;
class FillDbController extends Controller
{
    public function actionInitFill()
    {
        foreach (TaskStatus::getStatusTitle() as $id => $title) {
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
        foreach (TaskPriority::getPriorityTitle() as $id => $title) {
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
        foreach (ProjectStatus::getProjectStatusTitle() as $id => $title) {
            $projectStatus = ProjectStatus::findOne($id);
            if (!isset($projectStatus)) {
                $projectStatus = new ProjectStatus();
                $projectStatus->id = $id;
            }
            $projectStatus->title = $title;
            if ($projectStatus->save()) {
                echo "status.id={$id} with title={$title} is created \r\n";
            } else {
                var_dump($projectStatus->id);
                var_dump($projectStatus->errors);
                die();
            }
        }
    }
}