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
<title>Contest</title>
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
	

        <div style="width: 80%; height: auto; margin: 0 auto;">
        <?php
 if($data['flag']==1) echo '<h2><span class="label label-success">Registration Successful</span></h2>'; else if($data['flag']==2) echo'<h2><span class="label label-info">You have already registered</span></h2>' ; else if($data['flag']==3) echo'<h2><span class="label label-warning">Error please try again</span></h2>'; ?>
        <table style="width: 100%" class="altrowstable" id="alternatecolor">
            <?php
 if($data['type']==0) { echo '<tr>'; echo '<th class="id">Username</th>'; echo '<th class=="name">Contest</th>'; echo '<th class="time">Result</th>'; echo '</tr>'; foreach($otherdata as $item) { if(isset($data['sid'])&&$item['uid']==$data['sid']) { echo'<tr style="background-color:#fc9f9f ">'; echo'<td style="background-color:#f87373 ">'.$item["username"].'</td>'; echo'<td>'.$contestname.'</td>'; if($item['ischeck']==0) { echo '<td class="time" style="color:#3A5FCD">'.Pending.'</td'; } else if($item['ischeck']==1) { echo '<td class="time" style="color:#00CD00">'.Accept.'</td'; } else { echo '<td class="time" style="color:#FF0000">'.Refuse.'</td'; } echo'</tr>'; } else { echo '<tr>'; echo '<td class="id">'.$item['username'].'</td>'; echo '<td class="id">'.$contestname.'</td>'; if($item['ischeck']==0) { echo '<td class="time" style="color:#3A5FCD">'.Pending.'</td'; } else if($item['ischeck']==1) { echo '<td class="time" style="color:#00CD00">'.Accept.'</td'; } else { echo '<td class="time" style="color:#FF0000">'.Refuse.'</td'; } echo '</tr>'; } } } else { echo '<tr>'; echo '<th class="id">Teamname</th>'; echo '<th class=="name">Contest</th>'; echo '<th class="time">Result</th>'; echo '</tr>'; foreach($otherdata as $item) { if(isset($data['sid'])&&$item['tid']==$data['sid']) { echo'<tr style="background-color:#fc9f9f ">'; echo'<td style="background-color:#f87373 ">'.$item["name"].'</td>'; echo'<td>'.$contestname.'</td>'; if($item['ischeck']==0) { echo '<td class="time" style="color:#3A5FCD">'.Pending.'</td'; } else if($item['ischeck']==1) { echo '<td class="time" style="color:#00CD00">'.Accept.'</td'; } else { echo '<td class="time" style="color:#FF0000">'.Refuse.'</td'; } echo'</tr>'; } else { echo '<tr>'; echo '<td class="id">'.$item['name'].'</td>'; echo '<td class="id">'.$contestname.'</td>'; if($item['ischeck']==0) { echo '<td class="time" style="color:#3A5FCD">'.Pending.'</td'; } else if($item['ischeck']==1) { echo '<td class="time" style="color:#00CD00">'.Accept.'</td'; } else { echo '<td class="time" style="color:#FF0000">'.Refuse.'</td'; } echo '</tr>'; } } } ?>
        </table>
        </div>
            <script type="text/ecmascript">
            var registerUrl = '<?php echo U("Contest/Index/Register", '', '');?>';
            var formUrl = '<?php echo U("Contest/Index/Form", '', '');?>';
            var handleUrl = '<?php echo U("Contest/Index/Problemlist", '', '');?>';
            var countUrl ='<?php echo U("Contest/Index/Newscount", '', '');?>';
            var cid="<?php echo ($contestinfo[0]['cid']); ?>";
        </script>
        <script src="__PUBLIC__/Js/jquery-1.10.2.min.js"></script>
        <script src="__PUBLIC__/Js/onload.js"></script>
        <script src="__PUBLIC__/Js/jquery-ui.min.js"></script>
        <link href="__PUBLIC__/Css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="__PUBLIC__/Css/contest.css" rel="stylesheet">
    </body>

</html>