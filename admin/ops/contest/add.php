<?php
    if (!isset($_COOKIE['userid'])){
        header("Location:../../index.php");
        exit();
    }
     include ("../../db/DB.Class.php");
     include ("../db/func.php");
     $db = new DB();
     $uid = intval($_COOKIE['userid']);
     $Marks = FALSE;
     if (isset($_GET['cid'])){
         
             $Marks = TRUE;
             $sql = 'select * from contest where cid = ' . $_GET['cid'];
             $res = $db->dql($sql);
             $row = $res->fetch_assoc();
         
     } else if (isset($_POST['cid'])) {
             $langmask = strval($_POST['langc']=='on'?'1':'0') . strval($_POST['langcpp']=='on'?'1':'0') . strval($_POST['langjava']=='on'?'1':'0');
             $p_name=$_POST['name'];
             $p_stime=$_POST['start_time'];
             $p_edtime=$_POST['end_time'];
             $p_passwd=$_POST['password'];
             $p_desc=$_POST['desci'];
             $p_private=$_POST['private']=='on'?1:0;
             $p_type=$_POST['patype']=='on'?1:0;
             if($p_private==0)
                 $p_passwd="";
             if($p_private==1&&$p_passwd!="")
             {
                 $p_passwd=md5($p_passwd);
             }
             $sql = sprintf("update contest set name='%s',start_time='%s',end_time='%s',password='%s',desci='%s', private=%d,langmask='%s',type=%d  where cid=%d",
                                $p_name,$p_stime,$p_edtime,$p_passwd,$p_desc,$p_private,$langmask,$p_type,$_POST['cid']);
             $res = $db->dml($sql);
             //echo $res;
         
     } else {
         if (isset($_POST['name'])){
             $langmask = strval($_POST['langc']=='on'?'1':'0') . strval($_POST['langcpp']=='on'?'1':'0') . strval($_POST['langjava']=='on'?'1':'0');
             $p_name=$_POST['name'];
             $p_stime=$_POST['start_time'];
             $p_edtime=$_POST['end_time'];
             $p_passwd=$_POST['password'];
             $p_desc=$_POST['desci'];
             $p_private=$_POST['private']=='on'?1:0;
             $p_type=$_POST['patype']=='on'?1:0;
             if(!$p_private)
                 $p_passwd="";
             if($p_private&&$p_passwd!="")
                 $p_passwd=md5($p_passwd);
             $sql = sprintf("insert into contest (uid,name,start_time,end_time,password,desci,private,langmask,type) values (%d,'%s','%s','%s','%s','%s',%d,'%s',%d)",$uid,
                                $p_name,$p_stime,$p_edtime,$p_passwd,$p_desc,$p_private,$langmask,$p_type);
             $res = $db->dml($sql);
             //echo $res;
         }
     }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <link rel="stylesheet" href="../../css/iconFont.min.css" />
        <?php getMetroStyle(); ?>
        <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css" />
        <script src="../../js/bootstrap-datetimepicker.min.js"></script>
    </head>
    <body class="metro">
        <div>
            <form action="add.php" method="post">
                <div class="grid">
                    <div class="row">
                        <label class="span2 offset1">标题：</label>
                        <div class="input-control text span8">
                            <input type="text" name="name" value="<?php if($Marks) echo $row['name']; ?>" />
                            <button class="btn-clear" type="button"></button>
                        </div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">开始时间：</label>
                        <div class="input-control text span3">
                            <input type="text" id="startTime" name="start_time" class="" value="<?php if($Marks) echo $row['start_time']; ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">结束时间：</label>
                        <div class="input-control text span3">
                            <input type="text" id="endTime" name="end_time" class="" value="<?php if($Marks) echo $row['end_time']; ?>" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">密码：</label>
                        <div class="input-control text span8">
                            <input type="text" name="password" value="<?php if($Marks) echo $row['password']; ?>" />
                            <button class="btn-clear" type="button"></button>
                        </div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">描述：</label>
                        <div class="input-control textarea span8">
                            <textarea name="desci"><?php if($Marks) echo $row['desci']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">是否私有：</label>
                        <div class="span1">公有</div>
                        <div class="input-control switch span1">
                            <label>
                                <input type="checkbox" <?php if($Marks && intval($row['private']) == 1) echo 'checked';  ?> name="private" />
                                <span class="check"></span>
                            </label>
                        </div>
                        <div class="span1">私有</div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">比赛类型：</label>
                        <div class="span1">个人比赛</div>
                        <div class="input-control switch span1">
                            <label>
                                <input type="checkbox" <?php if($Marks && intval($row['type']) == 1) echo 'checked';  ?> name="patype" />
                                <span class="check"></span>
                            </label>
                        </div>
                        <div class="span1">团队比赛</div>
                    </div>
                    <div class="row">
                        <label class="span2 offset1">指定语言：</label>
                        <div class="input-control checkbox span1">
                            <label>
                                <input type="checkbox" <?php if($Marks && (intval($row['langmask'])  % 10 == 1)) echo 'checked';  ?> name="langc" />
                                <span class="check"></span>
                                C
                            </label>
                        </div>
                        <div class="input-control checkbox span1">
                            <label>
                                <input type="checkbox" <?php if($Marks && (intval($row['langmask']) / 10 % 10 == 1)) echo 'checked';  ?> name="langcpp" />
                                <span class="check"></span>
                                C++
                            </label>
                        </div>
                        <div class="input-control checkbox span2">
                            <label>
                                <input type="checkbox" <?php if($Marks && (intval($row['langmask']) / 100 % 10 == 1)) echo 'checked';  ?> name="langjava" />
                                <span class="check"></span>
                                JAVA
                            </label>
                        </div>
                    </div>
                    <?php if(isset($_GET['cid'])) echo sprintf("<input type='hidden' name='cid' value='%s' />",$_GET['cid']); ?>
                    <div class="row">
                        <div class="span1 offset4">
                            <input type="submit" class="default" value="Submit" />
                        </div>
                        <div class="span1 offset2">
                            <a href="index.php"><input type="button" value="Cancel" /></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<script>
    $(function () {
        $("#startTime,#endTime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            forceParse: 0
        });
    });
</script>
