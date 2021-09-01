<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\admin.css" type=text/css>


    <title>Admin page</title>
</head>
<body>
	<?php include("header.php"); 
	if(!($name[0]['loaitaikhoan']=='admin')){
		header('Location: '.base_url().'index.php/home/home/load_home');
	}
	
	?>
    <div class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/admin/admin/admin_view">Quản lý hệ thống</a></li>
            </ul>
            <div>
                <a class="addAccount" href="<?= base_url() ?>index.php/admin/admin/addAccount_view">Thêm tài khoản</a>
            </div>
        </div>
        <div id="accountList">
            <h3>Danh sách tài khoản</h3>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Mã tài khoản</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Loại tài khoản</th>
                        <th>Ngày tạo</th>
                        <th colspan="3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach ($listAccount as $key => $value):?>
                    <tr>
                        <td><?php echo $value['mataikhoan'] ?></td>
						<td><?php echo $value['taikhoan'] ?></td>
						<td><?php echo $value['matkhau'] ?></td>
						<td style="text-transform: uppercase;"><?php echo $value['loaitaikhoan'] ?></td>
						<td><?php echo $value['ngaytao'] ?></td>
                        <td><a href="deleteAcc/<?php echo $value['mataikhoan'] ?>">Xóa</a></td>
                        <td><a href="load_modifyAccount/<?php echo $value['mataikhoan'] ?>">Sửa</a></td>
                        <td><a href="<?= base_url() ?>index.php/api/testApi/api_view">Xem chi tiết</a></td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
            </table>
        </div>
		<div id="butDiv">
                    <a href="<?= base_url() ?>index.php/home/home/load_home">Quay lại</a>
					<a href="<?= base_url() ?>index.php/api/testApi/api_view">Danh sách nhân viên</a>
        </div>
    </div>
</body>
</html>
