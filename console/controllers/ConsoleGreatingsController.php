<?php

namespace console\controllers;
use yii\console\Controller;
use yii\console\ExitCode;
class ConsoleGreatingsController extends Controller
{
    public function actionIndex($message = 'Hello, World!')
    {
        echo $message . "\r\n";
        return ExitCode::OK;
    }
}
