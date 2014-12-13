var b = {
		"email" : false,
		"username" : false,
		"password" : false,
		"repassword" : false,
		"verify" : false
};

var strs = {
		"email" : "验证和登陆用的邮箱",
		"username" : "4~8位有效字符",
		"password" : "6~20位有效字符",
		"repassword" : "再次输入密码",
		"verify" : "点击图片一张"
};

var loading = "检测中。。。";
var submiting = "注册中。。。";

var normal = "#555555";
var error = "#d9534f";
var correct = "#5cb85c";

var emailReg = /^[\w-]+@[\w-]+(\.[\w-]+)+$/;
var usernameReg = /^[-\w\u4e00-\u9fa5]{4,8}$/i;
var passwordReg = /^\S{6,20}$/i;

var email = $("input[name=email]");
var username = $("input[name=username]");
var password = $("input[name=password]");
var repassword = $("input[name=repassword]");
var verify = $("input[name=verify]");

email.focus(function(){onWhichFocus($(this))});
username.focus(function(){onWhichFocus($(this))});
password.focus(function(){onWhichFocus($(this))});
repassword.focus(function(){onWhichFocus($(this))});
verify.focus(function(){onWhichFocus($(this))});

email.blur(checkEmail);
username.blur(checkUsername);
password.blur(checkPassword);
repassword.blur(checkRepassword);
verify.blur(checkVerify);

function onWhichFocus($node) {
	var name = $node.attr("name");
	$err = $("#" + name + "_err");
	$err.html(strs[name]);
	$err.css("color", normal);
}

function checkEmail() {
	var err = $("#email_err");
	err.html(loading);
	if (email.val() == '') {
		err.html("请填写邮箱！");
		err.css("color", error);
		b.email = false;
		return;		
	}
	if (!emailReg.test(email.val())) {
		err.html("邮箱格式不对！");
		err.css("color", error);
		b.email = false;
		return;
	}
	$.post("/Logging/ajaxCheck.html?mod=email", {"arg" : email.val()}, function(data){
		if (data == "1") {
			err.html("邮箱可用！");
			err.css("color", correct);
			b.email = true;
		} else {
			err.html("邮箱已经被注册了！");
			err.css("color", error);			
			b.email = false;
		}
	});
}

function checkUsername() {
	var err = $("#username_err");
	err.html(loading);
	if (username.val() == '') {
		err.html("请填写用户名！");
		err.css("color", error);
		b.username = false;
		return;		
	}	
	if (!usernameReg.test(username.val())) {
		err.html("用户名格式不对！");
		err.css("color", error);
		b.username = false;
		return;
	}
	$.post("/Logging/ajaxCheck.html?mod=username", {"arg" : username.val()}, function(data){
		if (data == "1") {
			err.html("用户名可用！");
			err.css("color", correct);
			b.username = true;
		} else {
			err.html("用户名已经被注册了！");
			err.css("color", error);			
			b.username = false;
		}
	});
}

function checkPassword() {
	var err = $("#password_err");
	err.html(loading);
	if (password.val() == '') {
		err.html("请填写密码！");
		err.css("color", error);
		b.password = false;
		return;		
	}
	if (!passwordReg.test(password.val())) {
		err.html("密码格式不对！");
		err.css("color", error);
		b.password = false;
	} else {
		err.html("密码可用！");
		err.css("color", correct);
		b.password = true;
	}
}

function checkRepassword() {
	var err = $("#repassword_err");
	err.html(loading);
	if (repassword.val() == '') {
		err.html("请填写确认密码！");
		err.css("color", error);
		b.repassword = false;
		return;		
	}			
	if (repassword.val() != password.val()) {
		err.html("两次密码不一致！");
		err.css("color", error);
		b.repassword = false;
	} else {
		err.html("两次密码一致！");
		err.css("color", correct);
		b.repassword = true;
	}
}

function checkVerify() {
	var err = $("#verify_err");
	err.html(loading);
	if (verify.val() == '') {
		err.html("请填写验证码！");
		err.css("color", error);
		b.verify = false;
		return;		
	}		
	$.post("/Logging/ajaxCheck.html?mod=verify", {"arg" : verify.val()}, function(data){
		if (data == "1") {
			err.html("填对了！");
			err.css("color", correct);
			b.verify = true;
		} else {
			err.html("没填对！");
			err.css("color", error);			
			b.verify = false;
		}
	});
}

function formSubmit() {
	for (var i in b) {
		if (!b[i]) {
			return false;
		}
	}
	return true;
}

function getNewVerify(node) {
	node.src = "/Logging/verifyImage.html?t=" + new Date().getTime();
}