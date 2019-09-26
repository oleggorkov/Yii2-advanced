<?php

use common\models\Project;
use frontend\models\ProjectSearch;
use frontend\models\TaskSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $taskDataProvider ActiveDataProvider */
/* @var $taskSearch \frontend\models\TaskSearch
 */
$this->title = 'Задачи проекта'.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            [
                'attribute' => 'project_status_id',
                'filter' => ArrayHelper::map(Project::find()->asArray()->all(), 'id', 'title'),
                'value' => function(\common\models\Project $model) {
                    return \common\models\ProjectStatus::getProjectStatusName()[$model->project_status_id];
                }
            ],
            [
                'attribute' => 'author_id',
                'value' => function(\common\models\Project $model) {
                    return $model->author->email;
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?= \yii\grid\GridView::widget([
        'filterModel' => $taskSearch,
        'dataProvider' => $taskDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
//            'project_id',
            'description:ntext',
            'author_id',
            'worker_id',
            'deadLine_date',
            'start_date',
            'end_date',
            'status_id',
            'priority_id',
            'created_at:datetime',
            //'updated_at',
        ],
    ]); ?>



</div>
