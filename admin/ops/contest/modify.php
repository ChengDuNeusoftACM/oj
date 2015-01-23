<?php
    if (!isset($_GET['cid'])){
        echo "Error";
        exit;
    }
    $cid = $_GET['cid'];
    $ty=$_GET['type'];
    include ("../../db/DB.Class.php");
    include ("../db/func.php"); 
    $db = new DB();
    $sql = "select * from contest where cid = $cid";
    $res = $db->dql($sql);
    if ($res && $res->num_rows < 1) {
        echo "Error";
        exit;
    }
    $row = $res->fetch_assoc();
    $type = intval($row['type']) == 0 ? 'contest_user' : 'contest_team';
    $ispri=intval($row['private']);
    $sex_state=include_once("../db/sex.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <?php getAllStyle(); ?>
    <script src="modify.js?www"></script>
</head>
<body class="metro">
    <div style="width: 100%;" class="grid">
        <div class="tab-control" data-role="tab-control">
            <ul class="tabs">
                <?php
                  if($ispri)
                  {
                      echo "<li class='active'><a href='#tab_1'>参赛人员</a></li>";
                      echo "<li><a href='#tab_2'>比赛题目</a></li>";
                  }
                  else
                      echo "<li class='active'><a href='#tab_2'>比赛题目</a></li>";
                ?>
                <li><a href="#tab_3">比赛新闻</a></li>
            </ul>
            <div class="frames">
                <div class="frame" id="tab_1">
                <div class="row">
                    <?php 
                        echo "<button onclick='addUser($cid,$ty)'>添加</button>";
                        showReload('info');
                    ?>
                </div>
                <div class="row">
                            <?php
                                echo "<table class='table striped'>";
                                if ($type == 'contest_user'){
                                    echo "<thead><tr><td>用户名</td><td>姓名</td><td>邮箱</td><td>性别</td><td>年级</td><td>专业</td><td>班级</td><td>队伍名</td><td>操作</td></tr></thead><tbody>";
                                    $sql="select u.uid,u.username,u.name,u.email,u.sex,u.grade,u.major,u.class,c.ischeck,t.name AS tname from $type c,user u,team t where t.tid=u.tid and c.uid=u.uid and cid =$cid";
                                    $res=$db->dql($sql);
                                    if($res&&$res->num_rows>0)
                                    {
                                        while ($row = $res->fetch_assoc()){
                                            echo "<tr><td>" . $row['username'] . "</td>";
                                            echo "<td>".$row['name']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                            echo "<td>".$sex_state[$row['sex']]."</td>";
                                            echo "<td>".$row['grade']."</td>";
                                            echo "<td>".$row['major']."</td>";
                                            echo "<td>".$row['class']."</td>";
                                            echo "<td>".$row['tname']."</td>";
                                            echo "<td>";
                                            echo sprintf("<button onclick='delUser(%d,%d)'>删除</button>",$row['uid'],$cid);
                                            if (intval($row['ischeck']) == 0) echo sprintf("<button class='success' onclick='checkUser(%d,%d)'>审核</button>",$row['uid'],$cid);
                                            echo "</td></tr>";
                                        }
                                    }
                                } else {
                                    echo "<thead><tr><td>队伍名</td><td>队长用户名</td><td>队长姓名</td><td>创建时间</td><td>操作</td></tr></thead><tbody>";
                                    $sql="select t.tid,t.name AS tname,u.username,u.name,t.create_time,c.ischeck from $type c,team t,user u where c.tid=t.tid and cid=$cid and t.head_id=u.uid";
                                    $res=$db->dql($sql);
                                    if($res&&$res->num_rows>0)
                                    {
                                        while ($row = $res->fetch_assoc()){
                                            echo "<tr><td>" . $row['tname'] . "</td>";
                                            echo "<td>".$row['username']."</td>";
                                            echo "<td>".$row['name']."</td>";
                                            echo "<td>".$row['create_time']."</td>";
                                            echo "<td>";
                                            echo sprintf("<button onclick='delUser(%d,%d)'>删除</button>",$row['tid'],$cid);
                                            if (intval($row['ischeck']) == 0) echo sprintf("<button class='success' onclick='checkUser(%d,%d)'>审核</button>",$row['tid'],$cid);
                                            echo "</td></tr>";
                                        }
                                    }
                                }
                                echo " </tbody></table>";
                            ?>
                </div>
                </div>
                <div class="frame" id="tab_2">
                <div class="row">
                   <?php
                       echo "<button onclick='addProblem($cid)'>添加</button>";
                       echo "<button onclick='saveProblem($cid)' class='primary'>保存</button>";
                       showReload('info');
                   ?> 
                </div>
                <div class="row">
                    <table class="table striped">
                        <thead>
                            <tr><td>编号</td><td>名称</td><td>重定义名称</td><td>作者</td><td>操作</td></tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select c.newid,c.newname,p.pname,p.pid,p.author from contest_problem c,problem p  where c.pid= p.pid and cid = $cid order by c.newid";
                                $res = $db->dql($sql);
                                if ($res && $res->num_rows > 0){
                                    while ($row = $res->fetch_assoc()){
                                            echo "<tr><td>" . $row['pid'] . "</td>";
                                            echo "<td>".$row['pname']."</td>";
                                            echo "<td><input type='text' value='" . $row['newname'] . "'/></td>";
                                            echo "<td>".$row['author']."</td>";
                                            echo "<td>";
                                            echo "<button onclick='delProblem(this)'>删除</button>";
                                            echo "</td></tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="frame" id="tab_3">
                    <div class="tab-control" data-role="tab-control">
                        <ul class="tabs">
                            <li class="active"><a href="#tab_3_1">查看</a></li>
                            <li><a href="#tab_3_2">添加新闻</a></li>
                        </ul>
                    <div class="frames">
                        <div class="frame" id="tab_3_1">
                    <div class="row">
                       <?php
                           showReload('info');
                       ?>
                    </div>
                    <div class="row">
                        <table class="table striped">
                            <thead>
                                <tr><td>编号</td><td>创建者</td><td>标题</td><td>创建时间</td><td>操作</td></tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select * from news where cid = $cid";
                                    $res = $db->dql($sql);
                                    if ($res && $res->num_rows > 0){
                                        while ($row = $res->fetch_assoc()){
                                                echo "<tr><td>" . $row['cnid'] . "</td>";
                                                echo "<td>" . $row['uid'] . "</td>";
                                                echo "<td>" . $row['title'] . "</td>";
                                                echo "<td>" . $row['create_time'] . "</td>";
                                                echo "<td>";
                                                echo sprintf("<button onclick='delNews(%d,%d)'>删除</button>",$row['cnid'],$cid);
                                                echo "</td></tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="frame" id="tab_3_2">
                        <form>
                            <label>标题：</label>
                            <div class="input-control text">
                                <input type="text" id="title" />
                                <span class="btn-clear"></span>
                            </div>
                            <label>正文：</label>
                            <div class="input-control textarea">
                                <textarea id="context"></textarea>
                            </div>
                            <?php echo "<input type='hidden' value='$cid' id='fcid' />" ?>
                            <div class="place-left">
                            <button type="submit" class="primary">提交</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        delModel();
        tipModel();
    ?>
    </div>
</body>
</html>
