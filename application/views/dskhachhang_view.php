<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\admin.css" type=text/css>


    <title>Danh sách khách hàng </title>
</head>
<body>
	<?php include("header.php");  ?>
    <div class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/dskhachhang/dskhachhang/dsKhachHang_view">Danh sách khách hàng</a></li>
            </ul>
        </div>
        <div id="accountList">
            <h3>Danh sách khách hàng</h3>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Mã Khách Hàng</th>
                        <th>Tên Khách Hàng</th>
						<th>Số Điện Thoại</th>
                        <th>Email</th>
                        <th>Mã hóa Đơn Xuất</th>
                        <th colspan="2">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach ($listkhachhang as $key => $value):?>
                    <tr>
                        <td><?php echo $value['makhachhang'] ?></td>
						<td><?php echo $value['tenkhachhang'] ?></td> 
						<td><?php echo $value['sodienthoai'] ?></td>
						<td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['mahoadonxuat'] ?></td>
                        <td><a href="Deletekhachhang/<?php echo $value['makhachhang'] ?>">Xóa</a></td>
                        <td><a href="editKhachHang_view/<?php echo $value['makhachhang'] ?>">Sửa</a></td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
