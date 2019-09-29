<?php

namespace frontend\modules\api2\controllers;
use Yii;
use common\models\Task;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\rest\Controller;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends \yii\rest\ActiveController
{
    public $modelClass = User::class;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //подключаем авторизацию через HttpBearerAuth
        //каждый запрос к этому контроллеру будет фильтроваться через это поведение
        //authenticator - имеет больший приоритет чем ACF
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            //нужно исключить action которые используются в accessFilter ACF
            'except' => ['create']
        ];
        return $behaviors;
    }
    public function actionMe()
    {
        return \Yii::$app->user->identity;
    }
    public function actionTasks($id = null)
    {
        if (is_null($id)) {
            $id = \Yii::$app->user->id;
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find()->where(['author_id' => $id,])
        ]);
        return $dataProvider;
//        $task = Task::findAll(['author_id' => $id]);
//        return $task;
    }
}
