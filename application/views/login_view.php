<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>/public/css/login.css" type=text/css>
	<title>Đăng nhập</title>
</head>
<body>
		<div id="mask">
			<form method="post" action="<?= base_url() ?>index.php/admin/login/checkLogin">
				<h1>Đăng nhập</h1>
				<div>
					<label id="la1" for="taikhoan">Tài Khoản</label>
					<input id='taikhoan' name='taikhoan' type="text" placeholder="Nhập tài khoản">
				</div>
				<div>
					<label id="la2" for="matkhau">Mật Khẩu</label>
					<input id='matkhau' name='matkhau' type="password" placeholder="Nhập mật khẩu">
				</div>
				<div id="buttonDiv">
					<button id="but1" type="Submit">Đăng nhập</button> 
				</div>
				<span id="error">
					<?php 
					if (isset($error)) {
						echo $error;
					}
					?>
				</span>
			</form>
		</div>
</body>
</html>
