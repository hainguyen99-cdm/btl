<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>
    <title>editkhachhang</title>
</head>
<body>
	<?php include("header.php");  ?>
    <div class="container">
        <form action="<?= base_url() ?>index.php/dskhachhang/dskhachhang/editKhachHang" method="Post">
		
			<?php 
			 if(isset($khachhang)){
			foreach ($khachhang as $key => $value):?>
		    <div>
                <h3>Sửa đổi thông tin khách hàng</h3>
                <div id="account">
                    <div>
						<input type="hidden" name="makhachhang" value="<?php echo $value['makhachhang'] ?>">
                    </div>
                    <div>
                        <label for="tenkhachhang">Tài khoản</label>
                        <input name="tenkhachhang"
						value="<?php echo $value['tenkhachhang'] ?>"
						 type="text" id="tenkhachhang" placeholder="Nhập tên khách hàng">
                    </div>
					<span class="notificationError">
					</span>
                    <div>
                        <label for="sodienthoai">Số điện thoại</label>
                        <input name="sodienthoai"
						value="<?php echo $value['sodienthoai'] ?>"
						 type="text" id="sodienthoai" placeholder="Nhập số điện thoại">
                    </div>
                    <div>
                        <label for="email">email</label>
                        <input name="email"
						value="<?php echo $value['email'] ?>"
						 type="text" id="email" placeholder="Nhập email">
                    </div>
                    <div>
                        <label for="mahoadonxuat">Mã hóa đơn xuất</label>
                        <input name="mahoadonxuat"
						value="<?php echo $value['mahoadonxuat'] ?>"
						 type="text" id="mahoadonxuat" placeholder="Nhập mã hóa đơn xuất">
                    </div>
                </div>
				<span class="notificationError">
				</span>
                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/dskhachhang/dskhachhang/dsKhachHang_view">Quay lại</a>
                    <button type="submit">Sửa thông tin </button>
                </div>
            </div>
		<?php  endforeach; }?>
        </form>
    </div>
</body>
</html>
