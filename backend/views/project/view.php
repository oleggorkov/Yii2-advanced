<?php

use backend\models\TaskSearch;
use common\models\Project;
use common\models\Task;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var \yii\data\ActiveDataProvider $taskDataProvider */
/* @var \backend\models\TaskSearch $taskSearchModel */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

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
            [
                'attribute' => 'author_id',
                'value' => function(Project $model) {
                    return $model->author->email;
                }
            ],
//            'author.email',
            'projectStatus.title',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $taskDataProvider,
        'filterModel' => $taskSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'projectTitile',
                'value' => function(Task $model) {
                    return $model->project->title;
                }
            ],
            [
                'attribute' => 'authorEmail',
                'label' => 'Email Автора',
                'value' => function(Task $model) {
                    return $model->author->email;
                }
            ],
            [
                'attribute' => 'workerEmail',
                'label' => 'Email Исполнителя',
                'value' => function(Task $model) {
                    return $model->worker->email;
                }
            ],
            'deadLine_date',
            'start_date',
            'end_date',
            'status_id',
            'priority_id',
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>