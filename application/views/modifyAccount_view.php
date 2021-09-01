<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>
    <title>Modify Account</title>
</head>
<body>
	<?php include("header.php"); 
		if(!($name[0]['loaitaikhoan']=='admin')){
			header('Location: '.base_url().'index.php/home/home/load_home');
		}
	?>
    <div class="container">
        <form action="<?= base_url() ?>index.php/admin/admin/modifyAccount" method="Post">
		
			<?php 
			 if(isset($modifyAcc)){
			foreach ($modifyAcc as $key => $value):?>
		    <div>
                <h3>Sửa đổi thông tin tài khoản</h3>
                <div id="account">
                    <div>
						<input type="hidden" name="mataikhoan" value="<?php echo $value['mataikhoan'] ?>">
                    </div>
                    <div>
                        <label for="taikhoan">Tài khoản</label>
                        <input name="taikhoan"
						value="<?php echo $value['taikhoan'] ?>"
						 type="text" id="taikhoan" placeholder="Nhập tài khoản tài khoản">
                    </div>
					<span class="notificationError">
					</span>
                    <div>
                        <label for="matkhau">Mật khẩu</label>
                        <input name="matkhau"
						value="<?php echo $value['matkhau'] ?>"
						 type="text" id="matkhau" placeholder="Nhập mật khẩu">
                    </div>
                    <div>
                        <label for="loaitaikhoan">Loại tài khoản</label>
                        <select name="loaitaikhoan" id="loaitaikhoan">
                            <option value="employee">employee</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
					<div>
						<label for="ngaytao">Ngày tạo</label>
						<input name="ngaytao"
						value="<?php echo $value['ngaytao'] ?>"
						 type="date" id="ngaytao" >
					</div>
                </div>
				<span class="notificationError">
				</span>
                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/admin/admin/admin_view">Quay lại</a>
                    <button type="submit">Sửa tài khoản</button>
                </div>
            </div>
		<?php  endforeach; }?>
        </form>
    </div>
</body>
</html>
