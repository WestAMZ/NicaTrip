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
function sendPost(url,data,result)
{
    http = Connect();
    http.onreadystatechange = function()
    {
        if(http.readyState == 4 && http.status ==200)
        {
            result.html(http.responseText);
        }
        else if(http.readyState != 4)
        {
            result.html(http.responseText);
        }
    }
    http.open('POST',url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(data);
}