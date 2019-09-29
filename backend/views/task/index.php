<?php

use common\models\Project;
use common\models\Task;
use common\models\TaskPriority;
use common\models\TaskStatus;
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'projectTitle',
                'label' => 'Проект',
                'value' => function( Task $model) {
                    if (!empty($model->project)) {
                        return $model->project->title;
                    }
                    return null;
                }
            ],
            [
                'attribute' => 'authorEmail',
                'label' => 'Автор',
                'value' => function(Task $model) {
                    return $model->author->username;
                }
            ],
            [
                'attribute' => 'workerEmail',
                'label' => 'Исполнитель',
                'value' => function(Task $model) {
                    return $model->worker->username;
                }
            ],
//            'worker_id',
//            'deadLine_date',
            [
                'attribute' => 'deadLine_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'deadLine_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->deadLine_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'start_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'start_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->start_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'end_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'end_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->end_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'status_id',
                'label' => 'Статус',
                'filter' => TaskStatus::getStatusTitle(),
                'value' => function( Task $model) {
                    return $model->status->title;
                }
            ],
            [
                'attribute' => 'priority_id',
                'label' => 'Приоритет',
                'filter' => TaskPriority::getPriorityTitle(),
                'value' => function(Task $model) {
                    return $model->priority->title;
                }
            ],
//            [
//                'attribute' => 'created_at',
//                'filter' => \kartik\date\DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'created_at',
//                    'language' => 'ru',
//                    'pluginOptions' => [
//                        'autoclose' => true,
//                        'todayHighlight' => true,
//                        'format' => 'dd.mm.yyyy',
//                    ]
//                ]),
//                'value' => function ($model) {
//                    return Yii::$app->formatter->asDate($model->created_at, 'php:d.M.Y');
//                }
//            ],
//            [
//                'attribute' => 'updated_at',
//                'filter' => \kartik\date\DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'updated_at',
//                    'language' => 'ru',
//                    'pluginOptions' => [
//                        'autoclose' => true,
//                        'todayHighlight' => true,
//                        'format' => 'dd.mm.yyyy',
//                    ]
//                ]),
//                'value' => function ($model) {
//                    return Yii::$app->formatter->asDate($model->updated_at, 'php:d.M.Y');
//                }
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>