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
    $language_state=include_once("../db/language.php");
    $result_state=include_once("../db/result_state.php");
    $db=new DB();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<?php getAllStyle(); ?>
    <script type="text/javascript" src="../../plug/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
    <script type="text/javascript" src="../../plug/syntaxhighlighter_3.0.83/scripts/shBrushCpp.js"></script>
    <script type="text/javascript" src="../../plug/syntaxhighlighter_3.0.83/scripts/shBrushJava.js"></script>
    <link type="text/css" rel="stylesheet" href="../../plug/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
   <link type="text/css" rel="stylesheet" href="../../plug/syntaxhighlighter_3.0.83/styles/shThemeDefault.css"/>
        <script type="text/javascript" src="../js/sol.js?e"></script>
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
                              <th>SolID</th>
                              <th>用户名</th>
                              <th>编号</th>
                              <th>名称</th>
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
							$sql="select s.soid,s.cid,s.process,u.username,p.pid,p.pname,s.result,s.memory,s.time,s.language,s.length,s.create_time from user AS u,problem AS p,solution AS s where u.uid=s.uid AND p.pid=s.pid";
                            $res=$db->dql($sql);
                            if($res&&($res->num_rows>0))
                            {
                                while($row=$res->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['soid']."</td>";          
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['pid']."</td>";
                                    echo "<td>".$row['pname']."</td>";
                                    if($row['cid']!=""&&$row['process']&&$row['result']!=4)
                                    {
                                        echo "<td style='color:".$result_state[$row['result']][1]."'>".$result_state[$row['result']][0]." on test ".$row['process']." </td>";
                                    }
                                    else 
                                    {
                                        echo "<td style='color:".$result_state[$row['result']][1]."'>".$result_state[$row['result']][0]."</td>";
                                    }
                                    if($row['result']>=4&&$row['result']<=9)
                                    {
                                        echo "<td>".$row['memory']."</td>";
                                        echo "<td>".$row['time']."</td>";
                                    }
                                    else
                                    {
                                        echo "<td>-</td> <td>-</td>";
                                    }
                                    echo "<td>".$language_state[$row['language']]."</td>";
                                    echo "<td><a href='javascript:showCode(".$row['soid'].",".$row['language'].")'>".$row['length']."</a></td>";
                                    echo "<td>".$row['create_time']."</td>";
                                    echo "</tr>";
                                }
                            }
						?>
					</tbody>
				</table>
			</div>
		</div> 
        <div id="showSourceModel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <div id="cppcode">
                    </div>
              </div>
           </div>
        </div> 
       </pre>
	</body>
</html>
