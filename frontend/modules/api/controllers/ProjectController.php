<?php

namespace frontend\modules\api\controllers;
use common\models\Project;
use yii\behaviors\BlameableBehavior;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
class ProjectController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }
    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'update' || $action==='delete') {
//        if ($action === 'view') {
            if ($model->author_id !== \Yii::$app->user->id) {
                throw new ForbiddenHttpException('Нельзя изменять и удалять проекты, где вы не являетесь автором');
            }
        }
    }
    public $modelClass = Project::class;
}
