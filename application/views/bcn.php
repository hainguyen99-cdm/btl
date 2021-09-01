<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\Bcn.css" type=text/css>
	<title>Báo cáo</title>
</head>
<body>
	<?php include("header.php"); ?>
	 		<div id="contentDiv" class="container">
	 			<div id="padthDiv">
		            <ul class="path">
		                <li><a href="<?= base_url() ?>index.php/baocao/baocao/baocao_view">Quản lý Báo cáo thống kê</a></li>
		                <li><a href="#">Báo cáo nhập hàng hoá</a></li>
		            </ul>
		            
		        </div>
				<div id="import">
					<h3>Báo cáo nhập hàng hoá</h3>
					<table class="styled-table">
						<thead>
							<tr>
								<th>Mã báo cáo</th>
								<th>Tên báo cáo</th>
								<th>Mã hoá đơn nhập</th>
								<th>Mã tài khoản</th>
								<th colspan="2">Thao tác</th>
							</tr>
						</thead>

						<tbody>
								<?php foreach ($listBcn as $key => $value):?>
								<tr>
									<td><?php echo $value['mabaocao'] ?></td>
									<td><?php echo $value['tenbaocao'] ?></td>
									<td><?php echo $value['mahoadonnhap'] ?></td>
									<td style="text-transform: uppercase;"><?php echo $value['mataikhoan'] ?></td>
									<?php 
									if($name[0]['loaitaikhoan']=='admin')
									{	
								
										echo '<td><a href="deleteBcn/'.$value["mabaocao"].'">Xóa</a></td>';

									}
									?>
									<td><a href="view_detailBcn/<?php echo $value['mahoadonnhap'] ?>">Xem chi tiết</a></td>
								</tr>
								<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div id="butDiv">
					<a href="<?= base_url() ?>index.php/baocao/baocao/baocao_view">Quay lại</a>
				</div>
		        
	 		</div>
</body>
</html>
