$("#agregarinsidencia").submit(function ()
{
    var data = $("#agregarinsidencia").serialize();
    /*var file_input = document.getElementById('fileToUpload');
    if(file_input.files.length > 0)
    {
        var nombre_archivo = file_input.files[0].name;
        data += '&fileToUpload='+nombre_archivo;
    }*/
    result = $('#result');
    var ms = $('#message');
    var modal = $('#myModal');

    agregarinsidencia('?post=insidencia', data, result, modal, ms);
    loadInsidencias($('#insidencias'),result,modal,ms);
    return false;
});

/*
        $("#agregarinsidencia").on("submit", function(e)
        {

            e.preventDefault();
            var input_file = document.getElementById('fileToUpload');
            var file = input_file.files;
            console.log(file);
            //var formData = new FormData(document.getElementById("agregarinsidencia"));
            //formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            /*$.ajax(
            {
                url: "?post=empleado",
                type: "post",0
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	           processData: false
            })
                .done(function(res){
                    $("#mensaje").html("Respuesta: " + res);
                });*/

//        });
$(document).ready(function()
{
    $('.tooltipped').tooltip({delay: 50});

     $('.finalizar').click(
         function()
         {
             var id_insidencia =  $(this).attr('name');
         }
     );

    $('#insidencias').on('click','.finalizar',function()
    {
        finalizarinsidencia($(this).attr('name'));
        loadInsidencias($('#insidencias'),null,null,null);

    });

    $('#insidencias').on('click','.activar',function()
    {
        reanudarinsidencia($(this).attr('name'));
        loadInsidencias($('#insidencias'),null,null,null);
    });

});
/*-------
            AJAX
---------*/
function agregarinsidencia(url,data,result,modal,message_area_modal)
{
    http = Connect();
    http.onreadystatechange = function ()
    {
         if (http.readyState == 4 && http.status == 200)
         {

                if (http.responseText == 1)
                {
                    message_area_modal.html("<img src='views/img/success.png'></img> la insidencia ha sido posteada");
                    modal.openModal();
                    result.html('');

                } else
                {
                    text = '<div class="alert alert-dismissible alert-danger">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' + http.responseText + '</div>';
                    result.html(http.responseText);
                }
        }
        else if (http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> Publicando insidencia </div>';
            result.html(text);
        }
    }
    http.open('POST',url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}

/*-------
            AJAX Metodos load
---------*/


function loadInsidencias(div,result,modal,message_area_modal)
{
    http = Connect();
    http.onreadystatechange = function()
    {
        if(http.readyState == 4 && http.status ==200)
        {
            div.html(http.responseText);
            message_area_modal.html("<img src='views/img/success.png'></img> La insidencia ha sido publicada satisfactoriamente");
            modal.openModal();
            result.html('');
        }
        else if(http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info center s12 m12">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load2.gif"></img> Cargando...</div>';
            div.html(text);
        }
    }
    http.open('GET','?get=insidencias');
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(null);
}

function finalizarinsidencia(id,result,modal,message_area_modal)
{

    http = Connect();
    http.onreadystatechange = function ()
    {
         if (http.readyState == 4 && http.status == 200)
         {

            if (http.responseText == 1)
            {
                message_area_modal.html("<img src='views/img/success.png'></img> la insidencia ha sido finalizada");
                modal.openModal();
                result.html('');
            }
            else
            {
                text = '<div class="alert alert-dismissible alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' + http.responseText + '</div>';
                    //result.html(http.responseText);
            }

        }
        else if (http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> Procesando acción...</div>';
            //result.html(text);
        }
    }
    http.open('POST','?post=insidencia&mod=2&id='+id+'&estado=0');
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(null);
}
function reanudarinsidencia(id,result,modal,message_area_modal)
{

    http = Connect();
    http.onreadystatechange = function ()
    {
         if (http.readyState == 4 && http.status == 200)
         {

            if (http.responseText == 1)
            {
                message_area_modal.html("<img src='views/img/success.png'></img> la insidencia ha sido reanudad");
                modal.openModal();
                result.html('');
            }
            else
            {
                text = '<div class="alert alert-dismissible alert-danger">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' + http.responseText + '</div>';
                    //result.html(http.responseText);
            }

        }
        else if (http.readyState != 4)
        {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> Procesando acción...</div>';
            //result.html(text);
        }
    }
    http.open('POST','?post=insidencia&mod=2&id='+id+'&estado=1');
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(null);
}
