let username = $('.js-username').val();
let chat = new WebSocket('ws://yii2advanced.gb:8080');

chat.onmessage = function (e) {
    $('#response').text('');
    console.log(e);
    let response = JSON.parse(e.data);
    $('#chat').append('<div>'+response.created_at+' <b>' + response.username + '</b>: ' + response.message + '</div>');
    // $('#chat').scrollTop = $('#chat').height;
};

chat.onopen = function (e) {
    // alert("Connection established! Please set your username.")
};

$('#send').click(function () {
    chat.send(JSON.stringify({
            'username': username,
            'message': $('#message').val()
        })
    );
    $('#message').val('');
});