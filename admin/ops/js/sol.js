$(function(){
    $("#datatable").dataTable({
       "bProcessing":true 
    });
});
var xmlHttp;
function showCode(soid)
{
    if(soid<0)
        return;
    $("#showSourceModel").modal("show");
    xmlHttp=GetXmlHttpObject();
    if(xmlHttp==null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url="db.php";
    url=url+"?soid="+soid;
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    //$("#result").val('DIWJFIJIWI');
}
function stateChanged()
{
    if(xmlHttp.readyState==4||xmlHttp.readyState=="complete")
    {
        $("#result").val(xmlHttp.responseText);
    }
}
function GetXmlHttpObject()
{
    var xmlHttp=null;
    try{
        xmlHttp=new XMLHttpRequest();
    }
    catch(e)
    {
        //Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
