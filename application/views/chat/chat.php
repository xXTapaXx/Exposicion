

<div class="container">
    <!--<div class="usuariosLogeados">
        <div class="userContainer">
            <ul>
                <?php if($user != FALSE)foreach($user as $row):
                    if($row->username != $username)
                        echo '<li><a href="#" id="'.$row->id.'" onClick="asignarChat('.$idUsername. ','.$row->id.');">'.$row->username.'</a></li>';;
                 endforeach;?>
            </ul>
        </div>
    </div>-->
    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">

                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - <?php echo $username; ?></h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>

                <div id="1" class="conteinerMsg">
                    <div class="panel-body msg_container_base" >

                    <?php if($mensajes != FALSE)foreach($mensajes as $row):
                        if($row->user != $username)
                    echo  '<div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>'.$row->mensaje.'</p>
                                <time datetime="2009-11-13T20:00">'.$row->timestamp.'</time>
                            </div>
                        </div>
                    </div>';
                    else
                        echo  ' <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages_sent msg_sent">
                                <p>'.$row->mensaje.'</p>
                                <time datetime="2009-11-13T20:00">'.$row->timestamp.'</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>';

                 endforeach;?>
                </div>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <form action="" id="form-send-message">
                        <input name ="message" id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat" onclick="insertar();">Send</button>
                        </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

