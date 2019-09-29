<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $activeUsers \common\models\User[] */
$this->title = 'Изменить проект: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'activeUsers' => $activeUsers
    ]) ?>

</div>
