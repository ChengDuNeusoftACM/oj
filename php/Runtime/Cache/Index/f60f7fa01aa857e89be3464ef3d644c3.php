<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="__PUBLIC__/CSS/bootstrap.min.css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/Top.css" />
<script src="__PUBLIC__/JS/jquery-1.11.1.min.js"></script>
<script src="__PUBLIC__/JS/bootstrap.min.js"></script>
<script src="__PUBLIC__/JS/Top.js"></script>
<script>
	var verifyUrl="<?php echo U('Index/Index/verify','','');?>";
	var RegistUrl="<?php echo U('Index/Index/Register','','');?>";
	var LoginUrl="<?php echo U('Index/Index/Login','','');?>";
	var Checkname="<?php echo U('Index/Index/Checkvalue','','');?>";
</script>
<title>User</title>
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
 if(isset($_SESSION['username'])==false){ echo '<button type="button" class="btn" id="signin">Sign In...</button>'; } else{ echo '<span id="welcome"><span id="signname"><a href="User?user='.$_SESSION[uid].'">'.$_SESSION['username'].'</a></span><a id="loginout" href="#" style="padding-left:30px;">Sign Out</a></span>'; } ?>
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
				  <img src=verify id="verify_code"/>
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
	<a id="Brand" href="<?php echo U('Index/Index','','');?>">
		<div id="cdoj">CDOJ</div>
		<div id="neu">Neusoft University</div>
	</a>
		<div id="navi">
		<ul class="nav nav-pills">
		    <li role="presentation"><a href="<?php echo U('Index/Index','','');?>">Home</a></li>
		    <li role="presentation"><a href="<?php echo U('Index/Index/Problemlist','','');?>">Problems</a></li>
		    <li role="presentation" class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		    Contests<span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu" role="menu">
		    	 <li role="presentation"><a href="<?php echo U('Contest/Index','','');?>">School Contests</a></li>
		    	 <li role="presentation"><a href="#">Virtual Contests</a></li>
		    	 <li role="presentation"><a href="#">Recent Contests</a></li>
		    </ul>
		  	</li>
			<li role="presentation"><a href="<?php echo U('Index/Index/Status','','');?>">Status</a></li>
		</ul>
		</div>
	</div>
	

	<div id="back">
		<div style="width:80%;height:100%;margin:0 auto;">
		<img src="__PUBLIC__/Image/Home/head2.png" id="headimg">
		<div id="userbar">
		<div class="infouser"><span id="username"><?php echo $info[0]['username'];?></span><span>from:  chengdu</span><span>Registered on:  <?php echo $info[0]['create_time'];?></span></div>
		<div class="infouser"><span>Name:  <?php echo $info[0]['name'];?></span><span>Rank:  1</span></div>
		<div class="infouser"><span>Submitted:  <?php echo $info[0]['submit'];?></span><span>Solved:  <?php echo $info[0]['solved'];?></span><span>Accepted:  xxx</span></div>
		<div class="infouser"><span>签名：  <?php echo $info[0]['note'];?></span></div>
		</div>
		</div>
	</div>
	<div id="userinfo" class="container">
	<ul class="nav nav-tabs" role="tablist">
  	<li role="presentation" class="active"><a href="#Problems" role="tab" data-toggle="tab">Problems</a></li>
  	<li role="presentation"><a href="#Team" role="tab" data-toggle="tab">Team</a></li>
  	<li role="presentation"><a href="#Messages" role="tab" data-toggle="tab">Messages</a></li>
	<?php
 if($_SESSION['uid']==$info[0]['uid']&&isset($_SESSION['username'])==true){ echo '<li role="presentation"><a href="#Modify" role="tab" data-toggle="tab">Modify</a></li>'; } ?>
	</ul>
		<div class="tab-content">
 	    <div role="tabpanel" class="tab-pane active" id="Problems">
 	     <?php
 for($i=1;$i<=$total;$i++){ echo '<span class="pid'; if($data[$i]==1) echo ' wa'; if($data[$i]==2) echo ' ac'; echo '"'; if($i==$total) echo 'style="margin-bottom:40px;"'; echo '><a herf="#">'.$i.'</a></span>'; } ?>
 	    </div>
  		<div role="tabpanel" class="tab-pane" id="Team">
  			<div class="gname"><span class="glyphicon glyphicon-stop teamfont"></span> Group Name:  <span class="teamfont">大傻逼</span></div>
  			<table id="teaminfo" class="table table-striped">
  				<tr class="teamfont">
  					<td>Display Name</td>
  					<td>User Name</td>
  					<td>Action</td>
  				</tr>
  				<tr>
  					<td>xxx</td>
  					<td>xxxxxxxxxxxxx</td>
  					<td>xx</td>
  				</tr>
			</table>
  		</div>
  		<div role="tabpanel" class="tab-pane" id="Messages">...</div>
  		
  		 <?php
 if($_SESSION['uid']==$info[0]['uid']&&isset($_SESSION['username'])==true){ echo '<div role="tabpanel" class="tab-pane" id="Modify">
  		<div class="gname"><span class="glyphicon glyphicon-stop teamfont"></span><span class="motitle">Update Your Information</span></div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Real Name：</span>
		 	<input type="text" class="form-control" placeholder="Enter real name or not">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Old password：</span>
		 	<input type="password" class="form-control must" id="oldpwd" placeholder="Please enter Old Password">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">New password：</span>
		 	<input type="password" class="form-control" id="newpwd" placeholder="If you do not want to change can not fill">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Confirm password：</span>
		 	<input type="password" class="form-control" id="cnpwd" placeholder="Confirm New Password">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Individuality Signature：</span>
		 	<input type="text" class="form-control" placeholder="Enter Individuality Signature">
		  </div>
		   <div class="input-group">
		   <span class="input-group-addon userinput">Sex：</span>
			  <select style="font:16px Helvetica;">  
			  	<option value ="1">male</option>  
			  	<option value ="2">female</option>  
			  </select>  
		  </div> 
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Major：</span>
		 	<input type="text" class="form-control" placeholder="Enter Major">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Grade：</span>
		 	<input type="text" class="form-control" placeholder="Enter grade">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Class：</span>
		 	<input type="text" class="form-control" placeholder="Enter Class">
		  </div>
		</div>'; } ?>
		</div>
	</div>
<link rel="stylesheet" href="__PUBLIC__/CSS/User.css" />
</body>
</html>