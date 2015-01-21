function showCode(id,lang){
    $("#showSourceModel").modal('show');
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
           var str;
           if(lang<=1)
               str="<pre class='brush: cpp;'>"+data+"</pre>";
           else
               str="<pre class='brush: java;'>"+data+"</pre>";
           $("#cppcode").html(str);
           SyntaxHighlighter.highlight();
        }
    });
}
$(function(){
    $("#datatable").dataTable({
       "bProcessing":true 
    });
});
