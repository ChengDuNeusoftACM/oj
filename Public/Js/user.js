$(function(){
	$('#createteam').click(function(){
		if($("#teamname").val()==""){
			$('#createteam').parent().find($('.error')).remove().end().append("<div class='error'>Please enter team name</div>");
		}
		else{
		$.post(TeamUrl, {
				"headid":headid,
                "teamname": $("#teamname").val()
            }, function (data) {
                location.reload(true);
            }, 'json');
		}
	})
	$('#addmember').click(function(){
		
	});
	$('.accept_invite').click(function(){
		$.post(AcceptUrl, {
				"tid":$(this).parent().parent().find('.tid').html(),
                "uid":headid
            }, function (data) {
                location.reload(true);
            }, 'json');
	})
	$('.cancel_invite').click(function(){
		$.post(CancelUrl, {
				"tid":teamid,
                "user":$(this).parent().parent().find('.invite_name').html()
            }, function (data) {
                location.reload(true);
            }, 'json');
	});
	$('.removeteam').click(function(){
		$.post(RemoveUrl, {
				'user':$(this).parent().parent().find('.memberuser').html()
            }, function (data) {
                location.reload(true);
            }, 'json');
	})
	$('#addmember').click(function(){
		$('#Invitebar').modal();
	})
	$('#CancelMember').click(function(){
		$('#Invitebar').modal('hide');
	})
	$('#AddMember').click(function(){
		$.post(AddUrl, {
				"tid":teamid,
                "user":$('#invitename').val()
            }, function (data) {
            	if(data==1){
            		$('#AddMember').parent().find($('.error')).remove().end().append("<div class='error'>No this user</div>");
            	}
            	else if(data==2){
            		$('#AddMember').parent().find($('.error')).remove().end().append("<div class='error'>have team</div>");
            	}
            	else{
                location.reload(true);
            	}
            }, 'json');
	})
	$('#leaveteam').click(function(){
		$.post(LeaveUrl, {
				
            }, function (data) {
                location.reload(true);
            }, 'json');
	})
	var pwdflag=1;
	var repwdflag=1;
	$('#repwd,#newpwd').blur(function(){
		if($('#repwd').val().trim()!=""||$('#newpwd').val().trim()!=""){
			pwdflag=0;
        }
        else{
        	pwdflag=1;
        }
        if(!pwdflag){
        	
        	if($('#repwd').val().trim()==""){
        		$('#repwd').parent().find($('.error')).remove().end().append("<span class='error'>*</span>");
        	}
        	else{
        		$('#repwd').parent().find($('.error')).remove();
        	}
        	if($('#newpwd').val().trim()==""){
        		$('#newpwd').parent().find($('.error')).remove().end().append("<span class='error'>*</span>");
        	}
        	else if($('#newpwd').val().trim().length<6||$('#newpwd').val().trim().length>20){
			$('#newpwd').parent().find($('.error')).remove().end().append("<span class='error'>密码应在6-20之间</span>");
			}
        	else{
        		$('#newpwd').parent().find($('.error')).remove();
        	}
        	if($('#repwd').val().trim()==$('#newpwd').val().trim()){
        		repwdflag=1;
        	}
        	else{
        		repwdflag=0;
        		$('#repwd').parent().find($('.error')).remove().end().append("<span class='error'>两次密码不一致</span>");
        	}
        }
		})
	var emailflag=1;
	$('#emailinfo').blur(function(){
		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if (!myreg.test($("#emailinfo").val().trim())) {
            $('#emailinfo').parent().find($('.error')).remove().end().append("<span class='error'>请输入正确的邮箱</span>");
        	emailflag=0;
        }
        else {
            $('#emailinfo').parent().find($('.error')).remove();
            emailflag=1;
        }
	})
	$('#submitmodify').click(function(){
		var pwdd;
		if(pwdflag){
			pwdd=$("#oldpwd").val().trim();
		}
		else{
			pwdd=$("#newpwd").val().trim();
		}
		if(repwdflag&&emailflag){
		$.post(ModifyUrl, {
			"name":$("#realname").val().trim(),
			"oldpwd":$("#oldpwd").val().trim(),
			"newpwd":pwdd,
			"note":$("#noteinfo").val().trim(),
			"sex":$("#sexselect").val()-1,
			"major":$("#majorinfo").val().trim(),
			"grade":$("#gradeinfo").val().trim(),
			"class":$("#classinfo").val().trim(),
			"email":$("#emailinfo").val().trim()
            }, function (data) {
            	console.log(data);
            	if(data==1){
            		$('#repwd').parent().parent().find($('.error')).remove().end().append("<div class='error' style='margin-left:120px;'>原密码错误</div>");
            	}
            	else{
                location.reload(true);
            	}
            }, 'json');
		$(".must").each(function (index) {
            if (index == 7)
                $("#" + this.id).trigger("blur");
        })


        return false;
	}
	})
})