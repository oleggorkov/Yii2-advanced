<?php

/** @var string $username */
?>
<?= \common\widgets\chatWidget\ChatWidget::widget();?>

<!--<style type="text/css">-->
<!--    .chat {-->
<!--        height: 400px;-->
<!--        width: 300px;-->
<!--        background: khaki;-->
<!--        padding: 10px;-->
<!--        border: solid 1px #3a526b;-->
<!--        /*float: right;*/-->
<!--    }-->
<!--    .messageChat {-->
<!--        height: 50px;-->
<!--        width: 300px;-->
<!--        /*background:khaki;*/-->
<!--        color:#3a526b;-->
<!--        border: solid 6px #3a526b;-->
<!--        margin:10px 0;-->
<!--    }-->
<!---->
<!--    .buttonChat {-->
<!--        background: #3a526b;-->
<!--        margin:10px 0;-->
<!--    }-->
<!---->
<!--    .usernameChat {-->
<!--        color: #b86607;-->
<!--        background: #0c5460;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div id="chat" class="chat"></div>-->
<!--    <div id="response" class="response"></div>-->
<!--    <div class="row">-->
<!--        <div class="col-lg-6"">-->
<!--            --><?//= \yii\helpers\Html::textInput('message', '', ['id' => 'message', 'class' => 'form-control messageChat']) ?>
<!--        </div>-->
<!---->
<!--        <div class="col-lg-8">-->
<!--            --><?//= \yii\helpers\Html::button('Отправить', ['id' => 'send', 'class' => 'btn btn-primary buttonChat']) ?>
<!--        </div>-->
<!--    </div>-->

<?= \yii\helpers\Html::hiddenInput('username', $username, ['class' => 'js-username usernameChat']) ?>

<!--<script>-->
<!--    let username = $('.js-username').val();-->
<!--    let chat = new WebSocket('ws://yii2advanced.gb:8080');-->
<!---->
<!--    chat.onmessage = function (e) {-->
<!--        $('#response').text('');-->
<!--        console.log(e);-->
<!--        let response = JSON.parse(e.data);-->
<!--        $('#chat').append('<div>'+response.created_at+' <b>' + response.username + '</b>: ' + response.message + '</div>');-->
<!--        // $('#chat').scrollTop = $('#chat').height;-->
<!--    };-->
<!---->
<!--    chat.onopen = function (e) {-->
<!--        alert("Connection established! Please set your username.")-->
<!--    };-->
<!---->
<!--    $('#send').click(function () {-->
<!--        chat.send(JSON.stringify({-->
<!--                'username': username,-->
<!--                'message': $('#message').val()-->
<!--            })-->
<!--        );-->
<!--        $('#message').val('');-->
<!--    });-->
<!--</script>-->