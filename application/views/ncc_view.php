<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\admin.css" type=text/css>


    <title>Quản lý nhà cung cấp</title>
</head>
<body>
	<?php include("header.php");  ?>
    <div class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="?= base_url() ?>index.php/nhacungcap/nhacungcap/ncc_view">Quản lý nhà cung cấp</a></li>
            </ul>
            <div>
                <a class="historyLink" href="<?= base_url() ?>index.php/nhacungcap/nhacungcap/addNcc_view">Thêm nhà cung cấp</a>
            </div>
        </div>
        <div id="accountList">
            <h3>Danh sách nhà cung cấp</h3>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Tên nhà cung cấp</th>
                        <th>Mã nhà cung cấp</th>
                        <th>Email liên lạc</th>
                        <th colspan="3">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach ($listncc as $key => $value):?>
                    <tr>
                        <td><?php echo $value['tennhacungcap'] ?></td>
						<td><?php echo $value['manhacungcap'] ?></td>
						<td><?php echo $value['email'] ?></td>
                        <td><a href="deleteNcc/<?php echo $value['manhacungcap'] ?>">Xóa</a></td>
                        <td><a href="suaNcc_view/<?php echo $value['manhacungcap'] ?>">Sửa</a></td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
