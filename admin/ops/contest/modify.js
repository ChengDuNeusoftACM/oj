var CID = -1;
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

function addProblem(cid){
    CID = cid;
    $.Dialog({
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
    });
}

function addProblemClick(){
    var pid = $('#pid').val();
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
    });
}

function delProblem(id,cid){
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
}

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
