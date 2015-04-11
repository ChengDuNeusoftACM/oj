<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/Top.css" />
<script src="__PUBLIC__/Js/jquery-1.11.1.min.js"></script>
<script src="__PUBLIC__/Js/bootstrap.min.js"></script>
<script src="__PUBLIC__/Js/Top.js"></script>
<script>
	var verifyUrl="<?php echo U('Index/Index/verify','','');?>";
	var RegistUrl="<?php echo U('Index/Index/Register','','');?>";
	var LoginUrl="<?php echo U('Index/Index/Login','','');?>";
	var Checkname="<?php echo U('Index/Index/Checkvalue','','');?>";
</script>
<title>Ranklist</title>
</head>
<body>
	<div id="topba" class="container">
	<ul class="nav nav-pills" role="tablist" id="topmenu">
	<li role="presentation"><a href="<?php echo U('Index/Index/RecentNews','','');?>">RecentsNews</a></li>
    <li role="presentation"><a href="#">Step-By-Step</a></li>
  	<li role="presentation"><a href="#">Download</a></li>
  	<li role="presentation"><a href="<?php echo U('Index/Index/Ranklist','','');?>">Ranklist</a></li>
  	<li role="presentation"><a href="#">FA.Qs</a></li>
  	<li role="presentation"><a href="#">BBS</a></li>
  	<li role="presentation"<?php if(isset($_SESSION['username'])==false){ echo 'onclick="Userclick()"';}?>><a <?php if(isset($_SESSION['username'])==true) echo 'href="'.U('Index/Index/User','','').'?user='.$_SESSION['uid'].'"';?>>User</a></li>
  	<li>
  	<?php
 if(isset($_SESSION['username'])==false){ echo '<button type="button" class="btn" id="signin">Sign In...</button>'; } else{ echo '<span id="welcome"><span id="signname"><a href="'.U('Index/Index/User','','').'?user='.$_SESSION['uid'].'">'.$_SESSION['username'].'</a></span><a id="loginout" href="#" style="padding-left:30px;">Sign Out</a></span>'; } ?>
  	</li>
  	
	</ul>
	</div>
	<div id="loginbar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm ">
	    <div class="modal-content loginbar">
	    	<div class="loginba">Login<span aria-hidden="true" id="close" data-dismiss="modal" ><img src="__PUBLIC__/Image/LoginRegist/X.png"></span></div>
		    
		    <div id="loginform">
				<div class="input-group formfirst">
				  <span class="input-group-addon">Name:</span>
				  <input type="text" class="form-control must" id="loginuname" placeholder="Please enter username">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Password:</span>
				  <input type="password" class="form-control must" id="loginpwd" placeholder="Please enter password">
				</div>
			</div>
			<div class="loginline"></div>
			<div class="btns">
				<button type="button" class="btn" id="loginBtn">Login</button>
				<button type="button" class="btn" id="registBtn" >Regist</button>
			</div>
	  </div>
	</div>
	</div>
	<div id="Registbar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content Regist-Content">
	    	<div class="registba">Regist<span aria-hidden="true" id="Xclose" data-dismiss="modal" ><img src="__PUBLIC__/Image/LoginRegist/X.png"></span></div>
		    <div id="Registform">
				<div class="input-group formfirst">
				  <span class="input-group-addon">Name:</span>
				  <input type="text" class="form-control must" id="rgname" placeholder="Please enter username" data-container="body" data-tigger="focus" data-toggle="popover" data-placement="right" data-content="用户名只由字母、数字、下划线构成的长度6-30">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Password:</span>
				  <input type="password" class="form-control must" id="rgpwd" placeholder="Please enter password">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Confirm Password:</span>
				  <input type="password" class="form-control must" id="rgrepwd" placeholder="Please confirm password">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">E-mail:</span>
				  <input type="text" class="form-control must" id="rgemail" placeholder="Please enter Email">
				</div>
				<div class="input-group">
				  <span class="input-group-addon">Verify:</span>
				  <input type="text" class="form-control must" id="rgverify">
				  <img src=<?php echo '"'.U('Index/Index/verify','','').'"';?> id="verify_code"/>
				</div>
			</div>
			
			<div class="loginline"></div>
			<div class="btns">
				<button type="button" class="btn" id="registedBtn">Regist</button>
				<button type="button" class="btn" id="resetBtn" >Reset</button>
			</div>
	  </div>
	</div>
	</div>
	<div id="Registsuccess" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	    	<div>注册成功</div>
	    	<button type="button" class="btn">完善个人资料</button>
			<button type="button" class="btn">暂时不用</button>
	  </div>
	</div>
	</div>
	<div class="container">
	<a id="Brand" href="<?php echo U('Index/Index/index','','');?>">
		<div id="cdoj">CDOJ</div>
		<div id="neu">Neusoft University</div>
	</a>
		<div id="navi">
		<ul class="nav nav-pills">
		    <li role="presentation"><a href="<?php echo U('Index/Index/index','','');?>">Home</a></li>
		    <li role="presentation"><a href="<?php echo U('Index/Index/ProblemList','','');?>">Problems</a></li>
		    <li role="presentation" class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		    Contests<span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" role="menu">
		    	 <li role="presentation"><a href="<?php echo U('Contest/Index/index','','');?>">School Contests</a></li>
		    	 <li role="presentation"><a href="#">Virtual Contests</a></li>
		    	 <li role="presentation"><a href="#">Recent Contests</a></li>
		    </ul>
		  	</li>
			<li role="presentation"><a href="<?php echo U('Index/Index/Status','','');?>">Status</a></li>
		</ul>
		</div>
	</div>
	

<div id="mainlist" class="container">

<div id="ranktitle">Ranklist</div>
	<div class="container-fluid" style="background-color:#787676;">
	<div class="navbar-form">
		<div class="input-group navbar-left searchbar">
          <input type="text" id="searchinfo" class="form-control" placeholder="enter any words">
         <span class="input-group-addon" id="submitinfo">Search</span>
         </div>
	   <nav class="navbar-right">
	      <ul class="pagination" style="margin: 0">
	       <?php  $SearchUrl=U('Index/Index/Ranklist','',''); $rear=$nowpage-1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==1) echo'<li class="disabled"><a href="#">&laquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$rear.$str.'">&laquo;</a></li>'; ?>
	       <?php
 $str=''; if($info!=null)$str='&info='.$info; if($pages<=5){ for($i=1;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } else{ if($nowpage<=3) for($i=1;$i<=5;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else if($pages-$nowpage<=2) for($i=$pages-4;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else for($i=$nowpage-2;$i<=$nowpage+2;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } ?>
	       <?php  $front=$nowpage+1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==$pages) echo'<li class="disabled"><a href="#">&raquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$front.$str.'">&raquo;</a></li>' ?>
	      </ul>
	    </nav>
	</div>
	</div>
	<table id="list" class="list">
		<tr>
			<th>Rank</th>
			<th>User Name</th>
			<th>Nick Name</th>
			<th>Individuality Signature</th>
			<th>Submit</th>
			<th>Solved</th>
			<th>Ratio</th>
		</tr>
		<?php if(is_array($data)): foreach($data as $k=>$p): ?><tr>
			<td><?php echo ($k+1); ?></td>
			<td><a href="<?php echo "User?user=".$p['uid']?>"><?php echo ($p["username"]); ?></a></td>
			<td><?php echo ($p["name"]); ?></td>
			<td><?php echo ($p["note"]); ?></td>
			<td><?php echo ($p["solved"]); ?></td>
			<td><?php echo ($p["submit"]); ?></td>
			<td><?php echo sprintf("%.2f", $p['solved']*1.0/$p['submit']*100).'%';?></td>
		</tr><?php endforeach; endif; ?>
	</table>
	<div class="container-fluid" style="margin:40px 0;">
	<div class="navbar-form">
	   <nav class="navbar-right">
	      <ul class="pagination" style="margin: 0">
	       <?php  $rear=$nowpage-1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==1) echo'<li class="disabled"><a href="#">&laquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$rear.$str.'">&laquo;</a></li>'; ?>
	       <?php
 $str=''; if($info!=null)$str='&info='.$info; if($pages<=5){ for($i=1;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } else{ if($nowpage<=3) for($i=1;$i<=5;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else if($pages-$nowpage<=2) for($i=$pages-4;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else for($i=$nowpage-2;$i<=$nowpage+2;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } ?>
	       <?php  $front=$nowpage+1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==$pages) echo'<li class="disabled"><a href="#">&raquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$front.$str.'">&raquo;</a></li>' ?>
	      </ul>
	    </nav>
	</div>
	</div>
	</div>
<link rel="stylesheet" href="__PUBLIC__/Css/Tabletpl.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/Ranklist.css" />
<script type="text/javascript" src='__PUBLIC__/Js/LiSt.js'></script>
	<script>
	var SearchUrl="<?php echo U('Index/Index/Ranklist','','');?>";
	</script>
</body>
</html>