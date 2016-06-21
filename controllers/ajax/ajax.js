function Connect() {
    var http = null;
    if (window.XMLHttpRequest) {
        http = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return http;
}
/*
    función para POST's
*/
function register(url, data, result, modal, message_area_modal) {
    http = Connect();
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (result != null) {
                if (http.responseText == 1) {
                    message_area_modal.html('<strong>You hava been registered suscessfull!!</strong><br> please check your email, where you will get an activation link);
                    modal.openModal();
                    result.html('');
                } else {
                    text = '<div class="alert alert-dismissible alert-danger">' +
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' + http.responseText + '</div>';
                    result.html(http.responseText);
                }
            }
        } else if (http.readyState != 4) {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST', url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}

//loguiarse
function login(url, data, result, modal, message_area_modal) {
    http = Connect();
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (result != null) {
                if (http.responseText == 1) {
                    //Se loguea
                    window.location = '?view=profile';
                } else {
                    //No se loguea
                    message_area_modal.html('<strong>Error!</strong><br> the data entered is incorrect or the account is not activated');
                    modal.openModal();
                    result.html('');
                }
            }
        } else if (http.readyState != 4) {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST', url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}

function addComment(url, data, result) {

    http = Connect();
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (result != null) {
                if (http.responseText == 1) {
                    //Se ingreso el comentario
                    //result.html('');
                } else {
                    // No se ingresa el comentario
                    //result.html(http.responseText);
                }
            }
        } else if (http.readyState != 4) {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST', url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}

function uploadPicture(url, data, result) {

    http = Connect();
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            if (result != null) {
                 if (http.responseText == 1) {
                    message_area_modal.html('<strong> Image uploaded sucessfull!!');
                    modal.openModal();
                    result.html('');
                } else {
                    tmessage_area_modal.html('<strong>Error to upload file!!');
                    modal.openModal();
                    result.html('');
                }
            }
        } else if (http.readyState != 4) {
            text = '<div class="alert alert-dismissible alert-info">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<img src="views/img/load.gif"></img> The request is being processed...</div>';
            result.html(text);
        }
    }
    http.open('POST', url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}
