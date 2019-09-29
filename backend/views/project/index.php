<?php

use common\models\Project;
use common\models\ProjectStatus;
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function(\common\models\Project $model) {
                    return Html::a($model->title, ['project/view', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'authorEmail',
                'label' => 'Автор проекта',
                'value' => function(Project $model) {
                    return $model->author->email;
                }
            ],
            [
                'attribute' => 'project_status_id',
                'label' => 'Статус проекта',
                'filter' => ProjectStatus::getProjectStatusTitle(),
                'value' => function( Project $model) {
                    return $model->projectStatus->title;
                }
            ],
            [
                'attribute' => 'created_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->created_at, 'php:d.M.Y');
                }
            ],
//            'created_at:datetime',
            //'updated_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>