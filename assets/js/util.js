/**
 * Created by tapa on 27/05/15.
 */
$( document ).ready(function() {
    var objDiv = document.getElementsByClassName("msg_container_base");
    objDiv[0].scrollTop = objDiv[0].scrollHeight;
});
$count = 1;
function insertar()
{
    $.ajax({
        type: "POST",
        url: "chat/insertarMensage",
        data: $('#form-send-message').serialize(),
        dataType: 'html',
        success: function(data)
        {

            send(data);// array JSON

        }
    });
}

function asignarChat(usuarioLocal,usuarioExterno)
{
    $count++;
    $local = usuarioLocal;
    $externo = usuarioExterno;
    $delete = "chat_window_"+$count;
    $userName = document.getElementById($externo).innerText;
    var size = $( ".chat-window:last-child" ).css("margin-left");
    size_total = parseInt(size) + 330;
    $chat = "";
    $chat += '<div class="row chat-window col-xs-5 col-md-3" id="chat_window_'+$count+'" style="margin-left:10px;">';
    $chat += '<div class="col-xs-12 col-md-12"><div class="panel panel-default"><div class="panel-heading top-bar"><div class="col-md-8 col-xs-8">';
    $chat += '<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - '+$userName+'</h3></div>';
    $chat += '<div class="col-md-4 col-xs-4" style="text-align: right;">';
    $chat += '<a href="#"><span class="glyphicon glyphicon-remove icon_close" data="chat_window_'+$count+'"></span></a></div></div><div id="'+$local+$externo+'" class="conteinerMsg">';
    $chat += '<div class="panel-body msg_container_base" ><?php if($mensajes != FALSE)foreach($mensajes as $row):if($row->user != $username)';
    $chat += 'echo  "\'"<div class="row msg_container base_receive"><div class="col-md-2 col-xs-2 avatar"><img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div>';
    $chat += '<div class="col-md-10 col-xs-10"><div class="messages msg_receive"><p>"\'".$row->mensaje."\'"</p><time datetime="2009-11-13T20:00">"\'".$row->timestamp."\'"</time></div></div></div>"\'";';
    $chat += 'else echo  "\'" <div class="row msg_container base_sent"><div class="col-md-10 col-xs-10"><div class="messages msg_sent"><p>"\'".$row->mensaje."\'"</p><time datetime="2009-11-13T20:00">"\'".$row->timestamp."\'"</time></div></div>';
    $chat += '<div class="col-md-2 col-xs-2 avatar"><img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div></div>"\'";endforeach;?></div></div></div>';
    $chat += '<div class="panel-footer"><div class="input-group"><form action="" id="form-send-message"><input name ="message" id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />';
    $chat += '<span class="input-group-btn"><button class="btn btn-primary btn-sm" id="btn-chat" onclick="insertar();">Send</button><input type="hidden" name="hidden" value="'+$local+$externo+'"></form></span></div></div>';

    var clone = $( ".container").append($chat);
    clone.css("margin-left", size_total);
}