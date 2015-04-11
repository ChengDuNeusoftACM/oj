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
	

	<div id="back">
		<div style="width:80%;height:100%;margin:0 auto;">
		<img src="__PUBLIC__/Image/Home/head2.png" id="headimg">
		<div id="userbar">
		<div class="infouser"><span id="username"><?php echo $info[0]['username'];?></span><span>from:  chengdu</span><span>Registered on:  <?php echo $info[0]['create_time'];?></span></div>
		<div class="infouser"><span>Name:  <?php echo $info[0]['name'];?></span><span>Rank:  <?php echo $info[0]['rank'];?></span></div>
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
  			<?php if(empty($team)==false) { echo '<div class="gname"><span class="glyphicon glyphicon-stop teamfont"></span> Group Name:  <span class="teamfont">'.$team[0]['name'].'</span>'; if($_SESSION['uid']==$info[0]['uid']){ echo '<span id="leaveteam">Leave Team</span>'; } echo '</div>
  				<div style="border-bottom:1px solid #ccc; padding-bottom:40px;">
  				<span>The Captain : <span class="teamfont">'.$captain.'</span>
  				<table id="teaminfo" class="table table-bordered" style="margin-top:20px;">
  				<tr class="teamfont active">
  					<th>Display Name</th>
  					<th>User Name</th>
  					<th>Action</th>
  				</tr>'; for($i=0;$i<count($teaminfo);$i++){ echo '<tr><td>'.$teaminfo[$i]['name'].'</td><td class="memberuser">'.$teaminfo[$i]['username'].'</td><td>'; if($_SESSION['uid']==$team[0]['head_id']&&$_SESSION['uid']!=$teaminfo[$i]['uid']&&$info[0]['uid']==$_SESSION['uid']) echo '<a href="#" class="removeteam">Remove</a>'; echo '</td></tr>'; } echo '</table></div>'; if($_SESSION['uid']==$team[0]['head_id']&&count($teaminfo)+$invite_count<3){ echo '<div style="margin-bottom:100px; cursor:pointer;" id="addmember"><a>+  Add Member</a></div>'; } else{ echo '<div style="margin-bottom:100px;"></div>'; } if($invite_count!=0){ echo '<span class="teamfont">Invited Team Member</span>
  				<table class="table table-bordered" style="margin-top:20px;margin-bottom:100px;">
  				<tr class="teamfont active">
  					<th>Display Name</th>
  					<th>User Name</th>
  					<th>Action</th>
  				</tr>'; for($i=0;$i<count($invite_info);$i++){ echo '<tr><td>'.$invite_info['name'].'</td><td class="invite_name">'.$invite_info[$i]['username'].'</td><td>'; echo '<a href="#" class="cancel_invite">Cancel</a>'; echo '</td></tr>'; } echo '</table>'; } } else{ echo '<div style="padding-bottom:20px;border-bottom:1px solid #ccc;margin-bottom:20px;"><div class="gname">No team</div>'; if($_SESSION['uid']==$info[0]['uid']){ echo '<div class="input-group">
			  	<span class="input-group-addon">Team Name：</span>
			 	<input type="text" class="form-control" id="teamname" placeholder="Enter your team name">
			  	</div>'; echo '<span id="createteam">Create Team</span></div>'; } echo '<span class="teamfont">To Be Accepted</span>
  				<table class="table table-bordered" style="margin-top:20px;margin-bottom:100px;">
  				<tr class="teamfont active">
  					<th>Team id</th>
  					<th>Team Name</th>
  					<th>Captain Name</th>
  					<th>Action</th>
  				</tr>'; for($i=0;$i<count($Accept_info);$i++){ echo '<tr><td class="tid">'.$Accept_info[$i]['tid'].'</td><td>'.$Accept_info[$i]['name'].'</td><td><a href="User?user='.$Accept_info[$i]['head_id'].'">'.$Accept_info[$i]['capname'].'</a></td><td style="cursor:pointer;">'; echo '<a class="accept_invite">Accept</a>'; echo '</td></tr>'; } echo '</table>'; } ?>

  		</div>
  		<div role="tabpanel" class="tab-pane" id="Messages">...</div>
  		 <?php
 if($_SESSION['uid']==$info[0]['uid']&&isset($_SESSION['username'])==true){ echo '<div role="tabpanel" class="tab-pane" id="Modify" style="margin-bottom:100px;">
  		<div class="gname"><span class="glyphicon glyphicon-stop teamfont"></span><span class="motitle">Update Your Information</span></div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Real Name：</span>
		 	<input id="realname" type="text" class="form-control" placeholder="Enter real name or not" value="'.$info[0]['name'].'">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Old password：</span>
		 	<input type="password" class="form-control must" id="oldpwd" placeholder="Please enter Old Password"  id="oldpwd">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">New password：</span>
		 	<input type="password" class="form-control" id="newpwd" placeholder="If you do not want to change can not fill">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Confirm password：</span>
		 	<input type="password" class="form-control" placeholder="Confirm New Password"  id="repwd">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Individuality Signature：</span>
		 	<input type="text" id="noteinfo" class="form-control" placeholder="Enter Individuality Signature" value="'.$info[0]['note'].'">
		  </div>
		   <div class="input-group">
		   <span class="input-group-addon userinput">Sex：</span>
			  <select style="font:16px Helvetica;" id="sexselect">
			  	<option value ="1"'; if($info[0]['sex']==0) echo ' selected="selected"'; echo '>male</option>  
			  	<option value ="2"'; if($info[0]['sex']==1) echo ' selected="selected"'; echo '>female</option>
			  	}
			  </select>  
		  </div> 
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Major：</span>
		 	<input type="text" id="majorinfo" class="form-control" placeholder="Enter Major" value="'.$info[0]['major'].'">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Grade：</span>
		 	<input type="text" id="gradeinfo" class="form-control" placeholder="Enter grade" value="'.$info[0]['grade'].'">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">Class：</span>
		 	<input type="text" id="classinfo" class="form-control" placeholder="Enter Class" value="'.$info[0]['class'].'">
		  </div>
		  <div class="input-group">
		  	<span class="input-group-addon userinput">E-mail：</span>
		 	<input type="text" id="emailinfo" class="form-control" placeholder="Enter your E-mail" value="'.$info[0]['email'].'">
		  </div>
		  <button class="btn btn-primary" id="submitmodify" style="position:absolute;float:right;right:20%;">Submit</button>
		</div>'; } ?>
		</div>
	</div>
	<div id="Invitebar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content Invitebar">
	    	<div class="input-group" style="margin:20px;margin-left:40px;">
		  	<span class="input-group-addon">Name：</span>
		 	<input type="text" class="form-control" id="invitename" placeholder="Enter the username">
		  	</div>
		  	<button class="btn" id="AddMember" style="margin:10px;margin-left:40px;">Submit</button>
		  	<button class="btn" id="CancelMember" style="margin:10px;margin-left:80px;">Cancel</button>
	  </div>
	</div>
<link rel="stylesheet" href="__PUBLIC__/Css/User.css" />
<script src="__PUBLIC__/Js/user.js"></script>
<script>
	<?php if(isset($info[0]['tid'])){ echo 'var teamid='.$info[0]['tid'].';'; }?>
	var headid=<?php echo $_SESSION['uid'];?>;
	var TeamUrl="<?php echo U('Index/Index/CreateTeam','','');?>";
	var AcceptUrl="<?php echo U('Index/Index/AcceptTeam','','');?>";
	var RemoveUrl="<?php echo U('Index/Index/RemoveMember','','');?>";
	var AddUrl="<?php echo U('Index/Index/AddMember','','');?>";
	var LeaveUrl="<?php echo U('Index/Index/LeaveTeam','','');?>";
	var CancelUrl="<?php echo U('Index/Index/CancelInvite','','');?>";
	var ModifyUrl="<?php echo U('Index/Index/ModifyInfo','','');?>";
</script>
</body>
</html>