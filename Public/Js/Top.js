var validate=new Array();
var passwordVal;
$(function () {
    for (var i = 0; i < 20; i++) {
        validate[i] = 0;
    }

    $("#signin").click(function () {
        $("#loginbar").modal();
    })
    $("#registBtn").click(function () {
        $("#loginbar").modal('hide');
        $("#Registbar").modal();
    })
    $("#verify_code").click(function () {
        $("#verify_code").attr("src", verifyUrl + '/' + Math.random());
    });
    $('#Registsuccess').on('hidden.bs.modal', function (e) {
        window.location.reload();
    })
    $("#loginBtn").click(function () {
        var flag = 0;
        for (var i = 0; i < 2; i++) {
            if (validate[i] == 0)
                flag = 1;
        }
        if (flag == 0) {
            $.post(LoginUrl, {
                "username": $("#loginuname").val(),
                "password": $("#loginpwd").val()
            }, function (data) {
                if (data == 1) {
                    $(".loginba").parent().find($('.alert')).remove();
                    $(".loginba").after("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a>User or password is wrong, please try again</div>");
                }
                else {
                    location.reload(true);
                }
            }, 'json');
        }

        $(".must").each(function (index) {
            if (index < 2)
                $("#" + this.id).trigger("blur");
        })

        return false;
    })
    $("#loginout").click(function () {
        $.post(Checkname, {
            "flag": "2"
        }, function () {
            location.reload();
        }, 'json');
    })
    $("#registedBtn").click(function () {
        var flag = 0;
        for (var i = 2; i - 2 < 5; i++) {
            if (validate[i] == 0)
                flag = 1;
        }

        if (flag == 0) {
            $.post(RegistUrl, {
                "username": $("#rgname").val(),
                "password": $("#rgpwd").val(),
                "email": $("#rgemail").val()
            }, function (data) {
                if (data == 0) {
                $("#Registbar").modal('hide');
                $("#Registsuccess").modal('show');
            }
            }, 'json');
        }

        $(".must").each(function (index) {
            if (index > 1)
                $("#" + this.id).trigger("blur");
        })


        return false;
    });
    if($('#contest_bar')[0]!=null)
    var heig = document.getElementById('contest_bar').offsetTop+document.getElementById('contest_bar').offsetHeight;
    $('#contest-info').css('top', (heig-50) + 'px');
})


$(function () {
    $(".must").each(function (index) {
        $("#" + this.id).blur(function () {
            var must = $("#" + this.id);
            if (must.val().trim() == '') {
                console.log("must.attr('id')");
                must.parent().find($('.error')).remove().end().append("<span class='error'>*</span>");
                validate[index] = 0;
                return;
            }
            else {
                if (index < 2)
                    validate[index] = 1;
                must.parent().find($('.error')).remove();

                var texT = must.val().trim();
                if (index == 2) {
                    if (texT.length < 2 || texT.length > 30) {
                        validate[index] = 0;
                        must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>用户名长度应在6-30之间</div>");

                    }
                    else {
                        var flag = 0;
                        for (var i = 0; i < texT.length; i++) {
                            if (!((texT[i] >= 'a' && texT[i] <= 'z') || (texT[i] >= 'A' && texT[i] <= 'Z') || (texT[i] >= '0' && texT[i] <= '9') || texT[i] == '_'))
                                flag = 1;
                        }
                        if (flag == 1) {
                            validate[index] = 0;
                            must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>只能由字母、数字、（_）构成</div>");

                        }
                        else {
                            console.log($("#rgname").val());
                            $.post(Checkname, {
                                "username": $("#rgname").val(),
                                "flag": "0"
                            }, function (data) {
                                if (data == 0) {
                                    validate[index] = 0;
                                    must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>用户名已存在</div>");
                                }
                                else {
                                    must.parent().find($('.Xerror')).remove();
                                    validate[index] = 1;
                                }
                            }, 'json');
                        }
                    }
                }


                else if (index == 3) {
                    if (texT.length < 6 || texT.length > 30) {
                        passwordVal = texT;
                        validate[index] = 0;
                        must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>密码长度应在6-30之间</div>");
                    }
                    else {
                        passwordVal = texT;
                        must.parent().find($('.Xerror')).remove();
                        validate[index] = 1;
                    }
                }


                else if (index == 4) {
                    if (texT != passwordVal) {
                        validate[index] = 0;
                        must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>两次密码不一致</div>");
                    }
                    else {
                        must.parent().find($('.Xerror')).remove();
                        validate[index] = 1;
                    }
                }

                else if (index == 5) {
                    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                    if (!myreg.test(texT)) {
                        validate[index] = 0;
                        must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>请输入正确的邮箱</div>");
                    }
                    else {
                        must.parent().find($('.Xerror')).remove();
                        validate[index] = 1;
                    }
                }

                else if (index == 6) {
                    $.post(Checkname, {
                        "verify": $("#rgverify").val(),
                        "flag": "1"
                    }, function (data) {
                        console.log(data);
                        if (data == 0) {
                            validate[index] = 0;
                            must.parent().find($('.Xerror')).remove().end().append("<div class='Xerror'>验证码错误</div>");
                        }
                        else {
                            must.parent().find($('.Xerror')).remove();
                            validate[index] = 1;
                        }
                    }, 'json');
                }
            }
        })

    })
})
function Userclick(){

    $("#loginbar").modal();
    $(".loginba").parent().find($('.alert')).remove();
    $(".loginba").after("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a>Please login first</div>");
}