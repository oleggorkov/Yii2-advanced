<?php

use common\models\ProjectStatus;
use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
/* @var $activeUsers User[]*/
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_id')->dropDownList($activeUsers) ?>

    <?= $form->field($model, 'project_status_id')->dropDownList(ProjectStatus::getProjectStatusTitle()) ?>

    <? $form->field($model, 'created_at')->textInput() ?>

    <? $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>