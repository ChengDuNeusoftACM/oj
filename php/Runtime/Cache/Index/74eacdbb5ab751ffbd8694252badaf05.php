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
<title>welcome to Neusoft Online Judge</title>
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
	<a id="Brand" href="<?php echo U('Index/Index','','');?>">
		<div id="cdoj">CDOJ</div>
		<div id="neu">Neusoft University</div>
	</a>
		<div id="navi">
		<ul class="nav nav-pills">
		    <li role="presentation"><a href="<?php echo U('Index/Index','','');?>">Home</a></li>
		    <li role="presentation"><a href="<?php echo U('Index/Index/ProblemList','','');?>">Problems</a></li>
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
	

<div id="Topcarousel">
<img src="__PUBLIC__/Image/Home/head1.png" style="position:absolute;left:138px;">
<img src="__PUBLIC__/Image/Home/head2.png" style="position:absolute;left:570px;">
<div id="carousel-example-generic" class="carousel slide  container" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active" >
        <div style="color:white;padding:200px;">1..........</div>
        </div>
        <div class="item">
        <div style="color:white;padding:200px;">2..........</div>
        </div>
        <div class="item">
        <div style="color:white;padding:200px;">3..........</div>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>
<div id="Announcement" class="container">
<span id="Palogo"><div style="margin:30px 0;font:24px arial;">Public<span class="glyphicon glyphicon-arrow-right" style="margin-left:20px;"></span></div>Announcement</span>
<span id="PaContext">
<div id="Patitle">Title</div>
<div id="PaCon">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</div>
</span>
</div>
<div class="container">
<div id="RecentsConba">Contests  ∨</div>

<?php if(is_array($data)): foreach($data as $key=>$p): ?><span class="RecentCon" style="border-top:8px solid rgb(168,80,0);">
<div class="ContestFrom">RECENT SCHOOL CONTEST →</div>
<div class="ContestTitle"><?php echo ($p["name"]); ?></div>
<div class="ContestDesci"><?php echo ($p["desci"]); ?><a href="#" style="margin-left:10px;">Read More...</a></div>
</span><?php endforeach; endif; ?>
</div>
<div id="download">
<div id="downloadbar">
<div id="Downlogo"><div style="margin:30px 0;font:24px arial;">Download</div>U can find anything</div>
<div id="DownSearch"><div style="font:28px arial; color:rgb(41,65,99);">Please enter the focus word</div>
or choose the type
<div >
<div class="input-group" style="padding:10px;" id="downsearchbar">
      <input type="text" class="form-control" placeholder="enter a name or  word" style="width:320px;">
        <button class="btn btn-primary" type="button" style="width:100px;">Search</button>
    </div>
</div>

</div>
<img src="__PUBLIC__/Image/Bottom/no2-line.png" style="height:100%;float:left;">
<div id="downtypebar">
<span class="typebar" ><a href="#" style="color:rgb(185,220,219);"><span class="glyphicon glyphicon-stop"></span>software</a></span>
<span class="typebar" ><a href="#" style="color:rgb(77,143,182);"><span class="glyphicon glyphicon-stop"></span>movie</a></span>
<span class="typebar" ><a href="#" style="color:rgb(237,118,66);"><span class="glyphicon glyphicon-stop"></span>word</a></span>
<span class="typebar" ><a href="#" style="color:rgb(242,246,73);"><span class="glyphicon glyphicon-stop"></span>study</a></span>
</div>
</div>
</div>
<link rel="stylesheet" href="__PUBLIC__/Css/Index.css" />
<script src="__PUBLIC__/Js/Index.js"></script>
<div id="BottombarI">
	<div class="container">
	<div id="BottombaI" >
	<div>CDOJ</div>
	<div style="color:#1f4368;">for ACM</div>
	</div>
	<div id="BottombaII">
	<div>UESTC Online Judge</div>
	<div>Any Problem,Please Report</div>
	<div>xxx xx xxx xx</div>
	</div>
	<div id="BottombaIII">
	<div>Neusoft</div>
	<div>Any Problem,Please Report</div>
	<div>xxx xx xxx xx</div>
	</div>
	</div>
	</div>
	<div id="BottombarII">
	
	</div>
	<link rel="stylesheet" href="__PUBLIC__/Css/Bottom.css" />
</body>
</html>