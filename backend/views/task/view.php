<?php

use common\models\Task;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Task */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'projectTitle',
                'value' => function(Task $model) {
                    return $model->project->title;
                }
            ],
            [
                'attribute' => 'authorEmail',
                'label' => 'Email Автора',
                'value' => function(Task $model) {
                    return $model->author->username;
                }
            ],
            [
                'attribute' => 'workerEmail',
                'label' => 'Email Исполнителя',
                'value' => function(Task $model) {
                    return $model->worker->email;
                }
            ],
            [
                'attribute'=>'deadLine_date',
                'format' => 'raw',
                'value'=>function($model) {
                    return Yii::$app->formatter->asDatetime($model->deadLine_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute'=>'start_date',
                'format' => 'raw',
                'label'=>'Дата начала выполнения задачи',
                'value'=>function($model) {
                    return Yii::$app->formatter->asDatetime($model->start_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute'=>'end_date',
                'format' => 'raw',
                'label'=>'Дата окончания выполнения задачи',
                'value'=>function($model) {
                    return Yii::$app->formatter->asDatetime($model->end_date, 'php:d.M.Y');
                }
            ],
            'status_id',
            'priority_id',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->created_at, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->updated_at, 'php:d.M.Y');
                }
            ]
        ],
    ]) ?>

</div>