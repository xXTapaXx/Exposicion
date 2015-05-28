var FancyWebSocket = function(url)
{
	var callbacks = {};
	var ws_url = url;
	var conn;
	
	this.bind = function(event_name, callback)
	{
		callbacks[event_name] = callbacks[event_name] || [];
		callbacks[event_name].push(callback);
		return this;
	};
	
	this.send = function(event_name, event_data)
	{
		this.conn.send( event_data );
		return this;
	};
	
	this.connect = function() 
	{
		if ( typeof(MozWebSocket) == 'function' )
		this.conn = new MozWebSocket(url);
		else
		this.conn = new WebSocket(url);
		
		this.conn.onmessage = function(evt)
		{
			dispatch('message', evt.data);
		};
		
		this.conn.onclose = function(){dispatch('close',null)}
		this.conn.onopen = function(){dispatch('open',null)}
	};
	
	this.disconnect = function()
	{
		this.conn.close();
	};
	
	var dispatch = function(event_name, message)
	{
		if(message == null || message == "")//aqui es donde se realiza toda la accion
			{
			}
			else
			{
				var JSONdata    = JSON.parse(message); //parseo la informacion
					actualiza_mensaje(message);
				}
				//aqui se ejecuta toda la accion
				
				
				
				
				
				
			}

};

var Server;
function send( text ) 
{
    Server.send( 'message', text );
}
$(document).ready(function() 
{
	Server = new FancyWebSocket('ws://192.168.0.117:9000');
    Server.bind('open', function()
	{
    });
    Server.bind('close', function( data ) 
	{
    });
    Server.bind('message', function( payload ) 
	{
    });
    Server.connect();
});



function actualiza_mensaje(message)
{
	var JSONdata    = JSON.parse(message); //parseo la informacion
				var tipo = JSONdata.tipo;
				var mensaje = JSONdata.mensaje;
				var fecha = JSONdata.fecha;

				var contenidoDiv  = $("#1").html();
				var mensajehtml   = '<div class="row msg_container base_send"><div class="col-md-10 col-xs-10"><div class="messages msg_send"><p>'+mensaje+'</p><time datetime="2009-11-13T20:00">'+fecha+'</time><div class="col-md-2 col-xs-2 avatar"><img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div></div></div></div>';
				
				$("#1").html(contenidoDiv+'<br/>'+mensajehtml);
    var objDiv = document.getElementsByClassName("msg_container_base");
    objDiv[0].scrollTop = objDiv[0].scrollHeight;



}
function actualiza_solicitud()
{
	alert("tipo de envio 2");
}
