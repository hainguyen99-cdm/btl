<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>
    <title>Add Account</title>
</head>
<body>
	<?php include("header.php"); 
		if(!($name[0]['loaitaikhoan']=='admin')){
			header('Location: '.base_url().'index.php/home/home/load_home');
		}
	?>
    <div class="container">
        <form action="<?= base_url() ?>index.php/admin/admin/AddAccount" method="Post">
            <div>
                <h3>Nhập thông tài khoản</h3>
                <div id="account">
                    <div>
                        <label for="mataikhoan">Nhập mã tài khoản</label>
                        <input name="mataikhoan" type="text" id="mataikhoan" placeholder="Nhập mã tài khoản">
						<span class="notificationError">
							<?php 
								if(isset($idError)){
								echo $idError;
							}
							?>
						</span>
                    </div>
                    <div>
                        <label for="taikhoan">Nhập tài khoản</label>
                        <input name="taikhoan" type="text" id="taikhoan" placeholder="Nhập tài khoản tài khoản">
                    </div>
					<span class="notificationError">
						<?php 
							if(isset($accError)){
							echo $accError;
						}
						?>
					</span>
                    <div>
                        <label for="matkhau">Nhập mật khẩu</label>
                        <input name="matkhau" type="password" id="matkhau" placeholder="Nhập mật khẩu">
                    </div>
                    <div>
                        <label for="loaitaikhoan">Chọn loại tài khoản</label>
                        <select name="loaitaikhoan" id="loaitaikhoan">
                            <option value="employee">employee</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
					<div>
						<label for="ngaytao">Ngày tạo</label>
						<input name="ngaytao" type="date" id="ngaytao" >
					</div>
                </div>
				<span class="notificationError">
					<?php 
						if(isset($lack)){
						echo $lack;
					}
					?>
				</span>
                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/admin/admin/admin_view">Quay lại</a>
                    <button type="submit">Thêm tài khoản</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
