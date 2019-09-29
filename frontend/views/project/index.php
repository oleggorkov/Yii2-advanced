<?php

use common\models\Project;
use common\models\ProjectStatus;
use common\models\User;
use common\widgets\chatWidget\ChatWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'title',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function(\common\models\Project $model) {
                    return Html::a($model->title, ['project/view', 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'project_status_id',
//                'filter' => \common\models\ProjectStatus::getProjectStatusTitle(),
                'filter' => ArrayHelper::map(ProjectStatus::find()->asArray()->all(), 'id', 'title'),
                'value' => function(\common\models\Project $model) {
//                    return $model->projectStatus->title;
                    return \common\models\ProjectStatus::getProjectStatusTitle()[$model->project_status_id];
                }
            ],
            [
                'attribute' => 'author_id',
//                'filter' => User::find(),
                'value' => function(\common\models\Project $model) {
                    return $model->author->email;
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
    <?= \common\widgets\chatWidget\ChatWidget::widget();?>

</div>