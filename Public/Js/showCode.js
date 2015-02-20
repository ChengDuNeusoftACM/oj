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
               str="<pre class='brush: cpp; toolbar:true;'>"+data+"</pre>";
           else
               str="<pre class='brush: java;'>"+data+"</pre>";
           $("#cppcode").html(str);
                   SyntaxHighlighter.config.clipboardSwf = '../../plug/syntaxhighlighter_3.0.83/scripts/clipboard.swf';
                   SyntaxHighlighter.config.strings = {expandSource : '展开代码',viewSource : '查看代码',copyToClipboard : '复制代码',copyToClipboardConfirmation : '代码复制成功',print : '打印',help: '?',alert: '语法高亮\n\n',noBrush: '不能找到刷子: ',brushNotHtmlScript: '刷子没有配置html-script选项',aboutDialog: '<div></div>'
};
           SyntaxHighlighter.highlight();
        }
    });
}
