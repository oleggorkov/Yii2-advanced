<?php

use common\models\Task;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $authors \common\models\User[] */
/* @var $projects \common\models\Project[] */
$this->title = 'Изменить задачу: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'authors' => $authors,
        'projects' => $projects
    ]) ?>

</div>
