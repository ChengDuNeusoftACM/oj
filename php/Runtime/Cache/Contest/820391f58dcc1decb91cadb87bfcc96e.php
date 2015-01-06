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
	

        <div id="contest_bar" style="width: 100%;margin: 0 auto;height: 200px;background: #434343;padding-top: 20px;">
            <div id="title-info">
                <div id="contest-name" style="">
                    <h1 class="contestname"><?php echo ($contestinfo[0]['name']); ?></h1>
                </div>
                <div id="time-info" style="padding: 5px 0 5px 0;">
                    <div style="text-align: center">
                        <span style="color:#4EA1F4">Current Time:</span><span style="color: #fff;" id="currenttime"></span>
                        <span style="color:#4EA1F4">Start Time:</span><span style="color: #fff"><?php echo ($contestinfo[0]['start_time']); ?></span>
                        <span style="color:#4EA1F4">End Time:</span><span style="color: #fff"><?php echo ($contestinfo[0]['end_time']); ?></span>
                        <span style="color:#4EA1F4">Contest Status:</span><span style="color: #00ff21"><?php echo ($contestinfo[0]['sta']); ?></span>
                    </div>
                </div>
                <div class="progress" style="width: 80%;margin: 0 auto;height: 40px;border-radius: 40px;">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" id="processbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="">
                </div>
                </div>
            </div>
        </div>
        <div id="contest-info" style="width: 80%;background: #e0dede;height: auto; left:50%;margin-left: -40%; border-radius: 20px 20px 0 0;position: absolute;top: 150px">
            <ul class="nav nav-tabs " role="tablist" style="margin: 5px 0 0 5px;">
              <li role="presentation" class=""><a href='<?php echo U("Index/Problemlist","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Overview</a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Report","","");?>?pid=<?php echo ($v["newid"]); ?>&cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Report<span class="badge"></span></a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Clarify","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Clarify</a></li>
              <li role="presentation" class="active"><a href='#'>Problems</a></li>
              <li role="presentation" class=""><a href='<?php echo U("Index/Status","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Status</a></li>
              <li role="presentation"><a href='<?php echo U("Index/Rank","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Rank</a></li>
              <li role="presentation"><a href='<?php echo U("Index/Prin","","");?>?cid=<?php echo ($contestinfo[0]["cid"]); ?>'>Print</a></li>
            </ul>
            <div style="text-align: center">
            <ul class="pagination">
                <?php if(is_array($problems)): foreach($problems as $key=>$v): if($v["newid"] == $problem[0]['newid']): ?><li><a href='<?php echo U("Index/Problem","","");?>?pid=<?php echo ($v["newid"]); ?>&cid=<?php echo ($contestinfo[0]["cid"]); ?>' style="background: rgb(66,139,202);color: #fff"><?php echo ($v["newid"]); ?></a></li> 
                        <?php else: ?>
                            <li><a href='<?php echo U("Index/Problem","","");?>?pid=<?php echo ($v["newid"]); ?>&cid=<?php echo ($contestinfo[0]["cid"]); ?>'><?php echo ($v["newid"]); ?></a></li><?php endif; endforeach; endif; ?>
            </ul>
            </div>
            <div class="problemname">
                <h1><?php echo ($problem[0]['newname']); ?></h1>
            </div>
            <div style="text-align: center">
                
                <span>Time Limit:</span><span style="color:rgb(106,142,142); margin:0 10px; "><?php echo ($problem[0]['time']); ?> MS</span>
                <span>Mempry Limit:</span><span style="color:rgb(106,142,142);margin:0 10px;"><?php echo ($problem[0]['memory']); ?> K</span>
                <span>Submit:</span><span style="color:rgb(106,142,142);margin:0 10px;"><?php echo ($problem[0]['submit']); ?></span>
                <span>Solve:</span><span style="color:rgb(106,142,142);margin:0 10px;"><?php echo ($problem[0]['accpet']); ?></span>
            </div>

            <div class="problembar">
                <button class="btn btnn submitbtn">Submit</button>
                <button class="btn btnn tostatus">Status</button>
            </div>
	        <div class="problemTag">
	        --&nbsp;<span style="font:32px arial;">D</span>escription&nbsp;--
	        </div>
	        <div class="problemTagtext">
	        <?php echo ($problem[0]['desci']); ?>
	        </div>
            <div class="problemTag">
	        --&nbsp;<span style="font:32px arial;">I</span>nput&nbsp;--
	        </div>
	        <div class="problemTagtext">
	        <?php echo ($problem[0]['input']); ?>
	        </div>
	        <div class="problemTag">
	        --&nbsp;<span style="font:32px arial;">O</span>utput&nbsp;--
	        </div>
	        <div class="problemTagtext">
	        <?php echo ($problem[0]['output']); ?>
	        </div>
	        <div class="problemTag">
	        --&nbsp;<span style="font:32px arial;">S</span>imple&nbsp;&nbsp;Input&nbsp;&&nbsp;Output&nbsp;--
	        </div>
	        <div class="problemTagtext">
	        <table id="inoutable">
	        <tr>
		        <th>Simple Input</th>
		        <th>Simple Output</th>
	        </tr>
	        <tr>
		        <td><?php echo ($problem[0]['indata']); ?></td>
		        <td><?php echo ($problem[0]['outdata']); ?></td>
	        </tr>
	        </table>
	        </div>
	        <div class="problemTag">
	        --&nbsp;<span style="font:32px arial;">S</span>ource&nbsp;--
	        </div>
	        <div class="problemTagtext">
	        <?php echo ($problem[0]['source']); ?>
	        </div>
	    </div>
        <div id="pad"></div>
        <div class="problembar">
                <button class="btn btnn submitbtn">Submit</button>
                <button class="btn btnn tostatus">Status</button>
        </div>
        <div id="submitbar" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content" id="SubmitContent">
            <div id="submitba">Submit</div>
              <textarea id="cpp-code"></textarea>
              <div class="btn-group" id="btnsgroup">
  		        <button type="button" class="btn btn-default" id="1Btn">C</button>
  		        <button type="button" class="btn btn-default active" id="2Btn">C++</button>
 	            <button type="button" class="btn btn-default" id="3Btn">Java</button>
	          </div>
	          <div id="submitbarBtnbar">
	  	        <button type="button" id="SubmitBtn" onclick="submitpro(<?php echo ($problem[0]['pid']); ?>,<?php echo ($contestinfo[0]['cid']); ?>)" class="SubmitbarBtn btn btn-primary">Submit</button>
		        <button type="button" id="CancelBtn" class="SubmitbarBtn btn btn-primary">Cancel</button>
	          </div>
              <p id="returninfo" class="bg-warning"></p>
            </div>
          </div>
        </div>

        <script type="text/ecmascript">
            var start_time = "<?php echo ($contestinfo[0]['startinunix']); ?>";
            var len = "<?php echo ($contestinfo[0]['len']); ?>";
            var problemUrl = '<?php echo U("Index/Problem?cid=".$problems[0]["cid"]."&pid=".$problem[0]["newid"]);?>}';
            var statusUrl = '<?php echo U("Contest/Index/Status", '', '');?>'+'?cid=<?php echo ($problems[0]["cid"]); ?>';
            var submitproUrl ='<?php echo U("Contest/Index/Submitpro", '', '');?>';
            var countUrl ='<?php echo U("Contest/Index/Newscount", '', '');?>';
            var cid="<?php echo ($contestinfo[0]['cid']); ?>";
        </script>
        <script src="__PUBLIC__/Js/problems.js"></script>
        <script src="__PUBLIC__/Js/codemirror.js"></script>
        <script src="__PUBLIC__/Js/clike.js"></script>
        <script src="__PUBLIC__/Js/jquery-ui.min.js"></script>
        <link href="__PUBLIC__/Css/codemirror.css" rel="stylesheet">
        <link href="__PUBLIC__/Css/conproblem.css" rel="stylesheet">
        <script type="text/javascript">
           
        var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('cpp-code'), {
            lineNumbers: true,
            smartIndent: true,
            electricChars: true,
            theme: 'default',
            mode: 'text/x-c++src'
        });
    </script>
    </body>
</html>