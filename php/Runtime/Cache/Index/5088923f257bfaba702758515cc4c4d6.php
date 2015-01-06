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
<title>RecentNews</title>
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
	

<div id="mainlist" class="container">
<div class="container-fluid" style="background-color:#787676;">
	<div class="navbar-form">
		<div class="input-group navbar-left searchbar">
          <input type="text" id="searchinfo" class="form-control" placeholder="enter any words">
         <span class="input-group-addon" id="submitinfo">Search</span>
         </div>
	   <nav class="navbar-right">
	      <ul class="pagination" style="margin: 0">
	       <?php  $SearchUrl=U('Index/RecentNews','',''); $rear=$nowpage-1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==1) echo'<li class="disabled"><a href="#">&laquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$rear.$str.'">&laquo;</a></li>'; ?>
	       <?php
 $str=''; if($info!=null)$str='&info='.$info; if($pages<=5){ for($i=1;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } else{ if($nowpage<=3) for($i=1;$i<=5;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else if($pages-$nowpage<=2) for($i=$pages-4;$i<=$pages;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } else for($i=$nowpage-2;$i<=$nowpage+2;$i++){ if($i==$nowpage)echo'<li class="active"><a href="#">'.$i.'</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$i.$str.'">'.$i.'</a></li>'; } } ?>
	       <?php  $front=$nowpage+1; $str=''; if($info!=null)$str='&info='.$info; if($nowpage==$pages) echo'<li class="disabled"><a href="#">&raquo;</a></li>'; else echo'<li><a href="'.$SearchUrl.'?page='.$front.$str.'">&raquo;</a></li>' ?>
	      </ul>
	    </nav>
	</div>
	</div>
	<?php $index=0;?>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php if(is_array($data)): foreach($data as $key=>$p): ?><div class="panel">
		    <div class="panel-heading title" role="tab" <?php echo 'id="heading'.$index.'"'?> >
		      <h4 class="panel-title title" <?php  if($index==0){ echo 'data-toggle="collapse" data-parent="#accordion" href="#collapse'.$index.'" aria-expanded="true" aria-controls="collapse'.$index.'"'; } else{ echo 'class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$index.'" aria-expanded="false" aria-controls="collapse'.$index.'"'; } ?>>
		        <div id="newtitle"><?php echo ($p["title"]); ?>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<?php if($index==0)echo'<img class="pointerimg" src="__PUBLIC__/Image/News/2.png" style="margin-left:100px;">';else echo'<img class="pointerimg" src="__PUBLIC__/Image/News/1.png" style="margin-left:100px;">';?></div>
		        <div id="newtime"><img src="__PUBLIC__/Image/News/tiem.png" style="margin-right:10px;">Fri.<?php echo ($p["create_time"]); ?><span><img src="__PUBLIC__/Image/News/by.png" style="margin-left:100px;"><?php echo ($p["username"]); ?></span></div>
		      </h4>
		    </div>
		    <div <?php echo 'id="collapse'.$index.'"'?> class="panel-collapse collapse <?php  if($index==0){ echo ' in"';} else{ echo '"';}?>  
			role="tabpanel" <?php echo 'aria-labelledby="heading'.$index.'"';$index++;?>>
		      <div class="panel-body">
		        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		      </div>
		    </div>
		  </div><?php endforeach; endif; ?>
		 </div>
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
<script>
	var SearchUrl="<?php echo U('Index/RecentNews','','');?>";
	</script>
	<link rel="stylesheet" href="__PUBLIC__/CSS/Tabletpl.css" />
	<script type="text/javascript" src='__PUBLIC__/JS/LiSt.js'></script>
	<script type="text/javascript" src='__PUBLIC__/JS/News.js'></script>
</body>
</html>