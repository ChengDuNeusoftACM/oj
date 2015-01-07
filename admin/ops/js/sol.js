function showCode(id){
    $("#showSourceModel").modal('show');
    $("#scs").val("SSSS");
    var url="db.php";
    $.ajax({
        url:"db.php",
        type:"POST",
        data:{soid:id},
        error:function()
        {
           alert('Error loading XML document');
        },
        success:function(data,status)
        {
           $("#cpp_code").val(data);
           alert(data);
        }
    });
}
$(function(){
    $("#datatable").dataTable({
       "bProcessing":true 
    });
});
