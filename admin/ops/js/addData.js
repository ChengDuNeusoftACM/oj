function addDataSubmitCheck()
{
    var is=true;
    if($("#txt_name").val()=="")
    {
        $("#div_title").addClass("error-state");
        $("#txt_name").focus();
        is=false;
    }
    else
        $("#div_title").removeClass("error-state");
    if($("#txt_in").val()=="")
    {
        $("#div_in").addClass("error-state");
        $("#txt_in").focus();
        is=false;
    }
    else
        $("#div_in").removeClass("error-state");
    if($("#txt_out").val()=="")
    {
        $("#div_out").addClass("error-state");
        $("#txt_out").focus();
        is=false;
    }
    else
        $("#div_out").removeClass("error-state");
        
    return is;
}
