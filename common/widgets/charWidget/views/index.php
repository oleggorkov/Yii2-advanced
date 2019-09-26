<?php

/**
 *
 */
?>
<?= \yii\helpers\Html::hiddenInput('username', $username, ['class' => 'js-username']) ?>

<div class="chat-popup from-container">
    <div class="js-chat-content">
        <h1>Чат</h1>
        <div class="js-message-content"></div>

        <label for="msg"><b>Сообщения</b></label>
        <textarea id="message" placeholder="Введите сообщение.." name="msg" required></textarea>

        <button type="button" id="send" class="btn">Отправить</button>
        <button type="button" class="btn cancel js-hide">Спрятать</button>
    </div>
    <button type="button" style="display: none;" class="btn btn-primary js-show">Показать</button>
</div>

<?php
?>
