function enviar()
{
    var ip = document.getElementById("ip").value;
    var puerto = document.getElementById("puerto").value;
    var inicio = document.getElementById("inicio").value;
    var id = document.getElementById("id").value;
    var nombre = document.getElementById("nombre").value;
    var correo = document.getElementById("correo").value;
    var mensaje = document.getElementById("mensaje").value;

    if(ip != "" && puerto != "" && inicio != "" && id != "" && nombre != "" && correo != "" && mensaje != "")
    {
        $.post("funcion_enviar.php", 
        {
            ip: ip,
            puerto: puerto,
            inicio: inicio,
            id: id,
            nombre: nombre,
            correo: correo,
            mensaje: mensaje
        }, 
        function(result)
        {
            if(result == "OK")
            {

            }
            else
            {
                console.log(result);
            }
        });
    }
    else
    {
        alert("No deje campos vacíos.")
    }
}