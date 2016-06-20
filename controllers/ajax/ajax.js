function Connect()
{
    var http = null;
    if(window.XMLHttpRequest)
    {
        http = new XMLHttpRequest();
    }
    else if(window.ActiveXObject)
    {
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return http;
}
/*
    función para POST's
*/
function register(url,data,result,modal,message_area_modal)
{
    http = Connect();
    http.onreadystatechange = function()
    {
        if(http.readyState == 4 && http.status ==200)
        {
            if(result != null)
            {
                if(http.responseText == 1)
                {
                    message_area_modal.html('<strong>Se ha registrado con exito!!</strong><br> revise su correo , donde obtendra el link para activar su cuenta');
                    modal.openModal();
                    result.html('');
                }
                else
                {
                    text = '<div class="alert alert-dismissible alert-danger">'+
  '<button type="button" class="close" data-dismiss="alert">&times;</button>' + http.responseText +'</div>';
                    result.html(http.responseText);
                }
            }
        }
        else if(http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST',url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}

//loguiarse
function login(url,data,result,modal,message_area_modal)
{
    http = Connect();
    http.onreadystatechange = function()
    {
        if(http.readyState == 4 && http.status ==200)
        {
            if(result != null)
            {
                if(http.responseText == 1)
                {
                    //Se loguea
                    window.location =  '?view=profile';
                }
                else
                {
                    //No se loguea
                    message_area_modal.html('<strong>Error!</strong><br> the data entered is incorrect or the account is not activated');
                    modal.openModal();
                    result.html('');
                }
            }
        }
        else if(http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST',url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}
