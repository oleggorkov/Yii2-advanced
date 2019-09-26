<?php

use common\models\Project;
use common\models\Task;
use common\models\TaskPriority;
use common\models\TaskStatus;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
/* @var $authors User[]*/
/* @var $projects Project[]*/
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_id')->dropDownList($projects) ?>

    <?= $form->field($model, 'author_id')->dropDownList($authors) ?>

    <?= $form->field($model, 'worker_id')->dropDownList($authors) ?>

    <?= $form->field($model, 'deadLine_date')->widget(\kartik\date\DatePicker::class, [
        'options' => [
            'placeholder' => 'Дата окончания срока выполнения',
            'value' => !$model->isNewRecord ? Yii::$app->formatter->asDate($model->deadLine_date, 'php:d.M.Y') : null,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'dd.mm.yyyy',
        ]
    ]); ?>

    <?= $form->field($model, 'start_date')->widget(\kartik\date\DatePicker::class, [
        'options' => [
            'placeholder' => 'Дата начала выполнения задачи',
            'value' => !$model->isNewRecord ? Yii::$app->formatter->asDate($model->start_date, 'php:d.M.Y') : null,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'dd.mm.yyyy',
        ]
    ]); ?>

    <?= $form->field($model, 'end_date')->widget(\kartik\date\DatePicker::class, [
        'options' => [
            'placeholder' => 'Дата окончания выполнения задачи',
            'value' => !$model->isNewRecord ? Yii::$app->formatter->asDate($model->end_date, 'php:d.M.Y') : null,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'dd.mm.yyyy',
        ]
    ]); ?>

    <?= $form->field($model, 'status_id')->dropDownList(TaskStatus::getStatusName()) ?>

    <?= $form->field($model, 'priority_id')->dropDownList(TaskPriority::getPriorityName()) ?>

    <? $form->field($model, 'created_at')->textInput() ?>

    <? $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
