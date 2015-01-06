<?php	
    if(!isset($_COOKIE['userid']))
    {
        header("Location:../../index.php");
        exit();
    }
    $uid=intval($_COOKIE['userid']);
    $uname=$_COOKIE['username'];
	include ("../../db/DB.Class.php");
	include ("../db/func.php"); 
    $db=new DB();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<?php getAllStyle(); ?>
        <script src="../js/sol.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div id="toolbar" class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<span class="navbar-brand">Tools</span>
					</div>
						<?php
						 showReload(); 
						?>
				</nav>
			</div>
			<div id="lists" class="row metro" style="with: 100%;">
				<table class="table striped hovered dataTable" id="datatable">
					<thead>
                          <tr>
                              <th>用户名</th>
                              <th>题目编号</th>
                              <th>题目名称</th>
                              <th>结果</th>
                              <th>内存</th>
                              <th>时间</th>
                              <th>语言</th>
                              <th>代码长度</th>
                              <th>提交时间</th>
                          </tr>
					</thead>
					<tbody>
						<?php
							$sql="select u.username,p.pid,p.pname,s.result,s.memory,s.time,s.language,s.length,s.create_time from user AS u,problem AS p,solution AS s where u.uid=s.uid AND p.pid=s.pid";
                            $res=$db->dql($sql);
                            if($res&&($res->num_rows>0))
                            {
                                while($row=$res->fetch_assoc())
                                {
                                    echo "<tr><td>".$row['username']."</td>";
                                    echo "<td>".$row['pid']."</td>";
                                    echo "<td>".$row['pname']."</td>";
                                    echo "<td>".$row['result']."</td>";
                                    echo "<td>".$row['memory']."</td>";
                                    echo "<td>".$row['time']."</td>";
                                    echo "<td>".$row['language']."</td>";
                                    echo "<td>".$row['length']."</td>";
                                    echo "<td>".$row['create_time']."</td>";
                                    echo "</tr>";
                                }
                            }
						?> 
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
