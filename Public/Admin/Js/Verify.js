/**
 *
 * Created by Jason on 2015/10/11.
 */
$(document).ready(function () {
    $("#submit").click(function () {
        //验证账号密码输入是否为空
        var username = $("#username");
        var password = $("#password");
        var verify = $("#verify");
        var url = $("#urlspan").html();
        if (!username.val().trim()) {
            alert("请输入账号");
            username.focus();
            return false;
        }
        if (!password.val().trim()) {
            alert("请输入密码");
            password.focus();
            return false;
        }
        //用.post请求成功
        //填写第四个参数，为json之后就会执行error函数
        //原因是服务器端返回的不是标准的json格式数据
        //二重POST请求
        $.post(url, {
            user: username.val(),
            pass: password.val(),
            verify: verify.val()
        }, function (data) {
            if (data == "true") {
                window.location= _index +"?user="+username.val();
            } else if (data == "false") {
                alert("账号或者密码错误");
                changeVerify();
            } else if(data == "验证码错误"){
                alert("验证码错误");
                changeVerify();
            }else{
                alert("发生错误，请重新登录");
            }
        });


        //用.ajax请求一直执行error函数返回状态码为200
        //已经知道错误问题 填写datatype为json之后就会执行error函数
        //原因是服务器端返回的不是标准的json格式数据
        /* $.ajax({
         type:"POST",
         url:url,
         data:{verify:$("#verify").val()},
         success:function(data){
         alert(data);
         },
         error:function(jqHXR){
         alert("发生错误"+jqHXR.status);
         }
         })*/
    });
});