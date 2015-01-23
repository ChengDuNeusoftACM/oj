var CID = -1,IsaddState=false;
function addUser(cid,type){
    CID = cid;
    var tit;
    if(type==0)
        tit='添加参赛人员';
    else
        tit='添加参赛队伍';
    $.Dialog({
        title: tit, 
        overlay: true,
        shadow: true,
        flat: true,
        content: '',
        padding: 10,
        onShow: function (_dialog) {
            var txt;
            if(type==0)
                txt="请输入用户帐号，多个帐号用换行分隔";
            else
                txt="请输入队伍名，多个队伍名用换行分隔";
            var content = "<div><textarea type='text' rows='20' cols='30' style='resize:none' id='uid' name='uid' placeholder='"+txt+"' />"+
                            "<div style='height:20px;'><button class='' style='float:right;' onclick='addUserCancel()'>Cancel</button><button class='default' style='float:right;' value='Submit' onclick='addUserClick()'>Submit</button></div></div>";
            $.Dialog.content(content);
        }
    });
}
function addUserCancel()
{
    $.Dialog.close();
}
function addUserClick(){
    var uid = $('#uid').val();
    if (uid.length < 1) return;
    var ds = uid.split('\n');
    /*for (var i = 0;i < ds.length;i++){
        alert(ds[i]);
    }*/
    $.post('addUser.php', { c: CID, u: ds }, function (data) {
        $.Dialog.close();
        $.Dialog({
            title: '',
            overlay: true,
            shadow: true,
            flat: true,
            content: data,
            padding: 10
        });
    });
}

function delUser(id,cid){
    $.post('delUser.php', {c:cid, i: id }, function (data) {
        $.Dialog.close();
        $.Dialog({
            title: '',
            overlay: true,
            shadow: true,
            flat: true,
            content: data,
            padding: 10
        });
    });
}

function delNews(id, cid) { 
    $.post('delNews.php', {c:cid, i: id }, function (data) {
        $.Dialog.close();
        $.Dialog({
            title: '',
            overlay: true,
            shadow: true,
            flat: true,
            content: data,
            padding: 10
        });
    });
}

function checkUser(id,cid){
    $.post('checkUser.php', { c: cid, i: id }, function (data) {
        location.reload();
    });
}
function saveProblem(cid)
{
   var cnt=$("#tab_2 table tbody tr").size();
   var pros=new Array();
   var problemOder=new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
   for(var i=0;i<cnt;i++)
   {
      pros[i]=new Array();
      pros[i][0]=$("#tab_2 table tbody tr").eq(i).find("td").eq(0).html();
      pros[i][1]=$("#tab_2 table tbody tr").eq(i).find("input").eq(0).val();
      pros[i][2]=problemOder[i];
      alert(pros[i][0]+"SSS "+pros[i][1]+" "+pros[i][2]);
   }
    pros=JSON.stringify(pros);
    $.post('saveContestProblems.php',{cid:cid,prs:pros},function(data)
    {
       alert(data); 
    });
}
function saveAddProblem()
{
    var id=$("#newadpid").val();
    if(IsExistAddProblem(id)==true)
    {
        $("#tipTxt").html("所加题目已经存在于本比赛中");
        $("#tipModel").modal('show');
        return;
    }
    $.post('getProblemInfo.php',{pid:id},function(data)
    {
           var ds=data.split(',');
           if(ds[0]=="success")
           {
               $("#newaddproblem").remove();
               var str="<tr><td>"+id+"</td><td>"+ds[1]+"</td><td><input type='text' value='"+ds[1]+"'/></td><td>"+ds[2]+"</td><td><button onclick='delProblem(this)'>删除</button></td></tr>";
               $("#tab_2 table:last-child").append(str);
               $("#tipTxt").html("保存成功");
               $("#tipModel").modal('show');
               IsaddState=false;
           }
           else
           {
               $("#tipTxt").html(ds[1]);
               $("#tipModel").modal('show');
           }
    });
}
function IsExistAddProblem(pid)
{
    var cnt=$("#tab_2 table tbody tr").size();
    for(var i=0;i<cnt-1;i++)
    {
        if($("#tab_2 table tbody tr").eq(i).find("td").eq(0).html()==pid)
        {
            return true;
        }
    }
    return false;
}
function cancelAddProblem()
{
    IsaddState=false;
    $("#newaddproblem").remove();

}
function addProblem(cid){
    CID = cid;
    if(IsaddState)
    {
        alert("请先保存");
        return;
    }
    $("#tab_2 table:last-child").append("<tr id='newaddproblem'><td><input type='text' style='width:60px'  id='newadpid'/></td><td></td><td></td><td></td><td><button class='primary' onclick='saveAddProblem()'>保存</button><button style='margin-left:10px;' onclick='cancelAddProblem()'>取消</button></td></tr>");
    IsaddState=true;
    /*$.Dialog({
        title: '添加题目',
        overlay: true,
        shadow: true,
        flat: true,
        content: '',
        padding: 10,
        onShow: function (_dialog) {
            var content = "<div><input type='text' id='pid' name='pid' placeholder='输入编号，多个用\",\"分割' /></div>" +
                            "<button class='info' onclick='addProblemClick()'>Submit</button>";
            $.Dialog.content(content);
        }
    });*/
}

function addProblemClick(){

    /*var pid = $('#pid').val();
    if (pid.length < 1) return;
     var ds = pid.split(',');
    for (var i = 0;i < ds.length;i++){
        if (isNaN(parseInt(ds[i]))){
            alert("输入不合法");
            return;
        }
    }
    $.post('addProblem.php', { c: CID, p: pid }, function (data) {
        $.Dialog.close();
        $.Dialog({
            title: '',
            overlay: true,
            shadow: true,
            flat: true,
            content: data,
            padding: 10
        });
    });*/
}

function delProblem(row)
{
    var isDelete=confirm("真的要删除吗?");
    if(isDelete)
    {
        var tr=row.parentNode.parentNode;
        var tbody=tr.parentNode;
        tbody.removeChild(tr);
    }
}
/*function delProblem(id,cid){
    $.post('delProblem.php', {c:cid, i: id }, function (data) {
        $.Dialog.close();
        $.Dialog({
            title: '',
            overlay: true,
            shadow: true,
            flat: true,
            content: data,
            padding: 10
        });
    });
}*/

$(function () {
    $("#tab_3_2 form").submit(function () {
        var title = $("#title").val();
        var txt = $("#context").val();
        var cid = $("#fcid").val();
        if (title.length < 1 || txt.length < 1) return;
        $.post("addNews.php", { t: title, r: txt, c: cid }, function () {
            location.reload();
        });

        return false;
    });
});
