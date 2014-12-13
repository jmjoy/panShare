<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="keywords" content="网盘分享" />
<meta name="description" content="网盘分享网站" />
<title>JoyProj - 网盘分享</title>
<link rel="stylesheet" type="text/css" href="/public/css/common.css" />
<link rel="stylesheet" type="text/css" href="/public/css/register.css" />
<script type="text/javascript" src="/public/js/jquery.js"></script>
</head>
<body>
	<div id="container">
		<div style="text-align:center; font-size: 1.5em;">注册</div><hr /><br />
		<form action="#" method="post" onsubmit="return formSubmit()">
			<table id="container_table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="table_left">邮箱：</td>
					<td colspan="2">
						<input class="table_input" name="email" required autofocus />
					</td>
					<td id="email_err" class="table_err">验证和登陆用的邮箱</td>
				</tr>
				<tr>
					<td class="table_left">用户名：</td>
					<td colspan="2">
						<input class="table_input" name="username" placeholder="可用：中文、英文、数字、-、_" required />
					</td>
					<td id="username_err" class="table_err">4~8位有效字符</td>
				</tr>
				<tr>
					<td class="table_left">密码：</td>
					<td colspan="2">
						<input class="table_input" type="password" name="password" placeholder="不可用：空白字符" required />
					</td>
					<td id="password_err" class="table_err">6~20位有效字符</td>
				</tr>
				<tr>
					<td class="table_left">确认密码：</td>
					<td colspan="2">
						<input class="table_input" type="password" name="repassword" required />
					</td>
					<td id="repassword_err" class="table_err">再次输入密码</td>
				</tr>
				<tr>
					<td class="table_left">验证码：</td>
					<td>
						<input class="table_input" name="verify" style="width: 100px;" required />
					</td>
					<td>
						<img src="/Logging/verifyImage.html" width="100px" heigt="30px" title="点击换一张" alt="验证码" 
							style="border: 1px solid #000000; cursor: pointer;" onclick="getNewVerify(this)" />
					</td>
					<td id="verify_err" class="table_err">点击图片一张</td>
				</tr>
				<tr>
					<td colspan="2"><input id="submit_btn" type="submit" value="注册">
					<a href="/Index/index.html">返回首页</a>
					</td>
				</tr>
			</table>
		</form>		
	</div>
</body>
<script type="text/javascript" src="/public/js/register.js"></script>
</html>