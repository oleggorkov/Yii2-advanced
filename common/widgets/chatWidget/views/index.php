<?php
?>
<?//= \yii\helpers\Html::hiddenInput('username', $username, ['class' => 'js-username']) ?>
<?//= \yii\helpers\Html::hiddenInput('project_id', $this->context->project_id, ['class' => 'js-project_id']) ?>
<?//= \yii\helpers\Html::hiddenInput('task_id', $this->context->task_id, ['class' => 'js-task_id']) ?>

    <div class="chat-popup form-container">
        <div class="js-chat-content">
            <h1>Чат</h1>
            <div class="js-messages-content"></div>


            <label for="msg"><b>Сообщения</b></label>
            <textarea id="message" placeholder="Введите сообщение.." name="msg" required></textarea>

            <button type="button" id="send" class="btn">Отправить</button>
            <button type="button" class="btn cancel js-hide">Спрятать</button>
        </div>
        <button type="button" style="display: none;" class="btn btn-primary js-show">Чат</button>
    </div>

<?php
?>