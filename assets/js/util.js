/**
 * Created by tapa on 27/05/15.
 */
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