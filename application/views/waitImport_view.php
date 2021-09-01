<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\WaitImport.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>

    <title>Hóa đơn nhập</title>
</head>
<body>
	<?php include("header.php");  ?>
    <div id="contentDiv" class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/home/home/load_home">Quản lý kho hàng</a></li>
                <li><a href="<?= base_url() ?>index.php/import/import/import_view">Nhập hàng hóa</a></li>
                <li><a href="<?= base_url() ?>index.php/import/import/waitImport_view">Hàng chờ nhập</a></li>
            </ul>
            <div>
                <a class="historyLink" href="<?= base_url() ?>index.php/import/import/deleteall">Xóa danh sách nhập hàng</a>
            </div>
        </div>
            <div id="importHisory">
                <h3>Danh sách hàng chuẩn bị nhập</h3>
                <table class="styled-table">
                    <thead>
                        <tr>
							<th>Số thứ tự</th>
                            <th>Mã sản phẩm</th>
                            <th>tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
							<th>Mã nhà cung cấp</th>
                            <th>Giá tiền</th>
							<th>Số lượng</th>
                            <th>Tổng tiền</th>
							<th>Ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 
						$i=1;
						foreach ($chonhap as $key => $value):?>
                        <tr>
							<td><?php echo $i ?></td>
                            <td><?php echo $value['masanpham'] ?></td>
                            <td><?php echo $value['tensanpham'] ?></td>
							<td><?php echo $value['loaisanpham'] ?></td>
							<td><?php echo $value['manhacungcap'] ?></td>
                            <td><?php echo $value['giathanh']." VNĐ" ?></td>
                            <td><?php echo $value['soluong'] ?></td>
                            <td><?php echo $value['tongtien']." VNĐ" ?></td>
							<td><img class="anh" src="<?= base_url() ?>\public\css\img\<?php echo $value['anh'] ?>"></td>
                            <td><a href="deleteIteam/<?php echo $value['masanpham'] ?>">Xóa</a></td>
                        </tr>
					<?php 
						$i++;
						endforeach; ?>
                        <!-- and so on... -->
                    </tbody>
                </table>
            </div>
			<div id="content">
           	<form action="<?= base_url() ?>index.php/import/import/importItem" method="post" enctype="multipart/form-data">
				<div id="productForm">
					<h3>Nhập thông tin hóa đơn</h3>
					<div id="product">
						<div>
							<label for="mahoadonnhap">Nhập mã hóa đơn nhập</label>
							<input type="text"
							name="mahoadonnhap"
							id="mahoadonnhap" placeholder="Nhập mã hóa đơn nhập">
						</div>
						<span class="notificationError">
								<?php 
									if(isset($error)){
									echo $error;
								}
								?>
							</span>
						<div>
							<label for="ngaynhap">Ngày nhập hàng</label>
							<input
							name="ngaynhap"
							type="date" id="ngaynhap" >
						</div>
						<div>
						<div>
							<label for="tongtien">Tổng tiền</label>
							<span id="tongtien"> 
								<?php 
									$tonghoadon =0;
									foreach($chonhap as $key => $value):
										$tonghoadon = $tonghoadon +$value['tongtien'];
									endforeach;
									echo $tonghoadon." VNĐ";
								?>
							</span>
						</div>
					</div>
				</div>
          	</form>
            <div id="butDiv">
                   <a href="<?= base_url() ?>index.php/import/import/import_view">Nhập thêm hàng hóa</a>
                   <button type="submit">Nhập hàng</button>
            </div>
   		</div>
	</div>
</body>
</html>
