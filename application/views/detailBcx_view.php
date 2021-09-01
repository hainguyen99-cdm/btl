<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\WaitImport.css" type=text/css>
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>

    <title>Hóa đơn xuất</title>
</head>
<body>
    <?php include("header.php");  ?>
    <div id="contentDiv" class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/baocao/baocao/baocao_view">Quản lý báo cáo thống kê</a></li>
                <li><a href="<?= base_url() ?>index.php/baocao/baocaox/baocaox_view">Báo cáo hoá đơn xuất hàng</a></li>
                <li><a href="">Chi tiết báo cáo hoá đơn xuất</a></li>
            </ul>
                </div>
            <div id="content">
           
                <div id="importHisory">
                    <h3>BÁO CÁO HOÁ ĐƠN XUẤT HÀNG</h3>
                    <table class="styled-table">
						<thead>
							<tr>
								<th>Mã báo cáo</th>
								<th>Tên báo cáo</th>
								<th>Mã hoá đơn xuất</th>
								<th>Mã tài khoản</th>
							
							
							</tr>
						</thead>	
						<tbody>
							<?php 
						
							foreach ($detailBcc as $key => $value):?>
							<tr>
							<tr>
							
								<td><?php echo $value['mabaocao'] ?></td>
								<td><?php echo $value['tenbaocao'] ?></td>
								<td><?php echo $value['mahoadonxuat'] ?></td>
								<td><?php echo $value['mataikhoan'] ?></td>

							</tr>
								<?php endforeach; ?>
						</tbody>
					</table>
                </div>
				<div id="importHisory">
                    <h3>Thông tin khách hàng</h3>
                    <table class="styled-table">
						<thead>
							<tr>
								<th>Tên khách hàng </th>
								<th>Số điện thoại</th>
								<th>Email</th>
							</tr>
						</thead>	
						<tbody>
							<?php 
						
							foreach ($detailKh as $key => $value):?>
							<tr>
							<tr>
								<td><?php echo $value['tenkhachhang'] ?></td>
								<td><?php echo $value['sodienthoai'] ?></td>
								<td><?php echo $value['email'] ?></td>
							</tr>
								<?php endforeach; ?>
						</tbody>
					</table>
                </div>
            </div>
            
              
    
            <div id="importHisory">
                <h3>CHI TIẾT HOÁ ĐƠN XUẤT HÀNG</h3>
                <table class="styled-table">
                    <thead>
                        <tr>
							<th>Danh sách mã sản phẩm nhập</th>
                            <th>Ngày xuất</th>
                            <th>Số lượng</th>
                            <th>Giá thành </th>
                            <th>Tổng tiền sản phẩm</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                       
                        foreach ($detailBcx as $key => $value):?>
                        <tr>
                           
                           	<td><?php echo $value['masanpham'] ?></td>
                        	<td><?php echo $value['ngayxuat'] ?></td>
                            <td><?php echo $value['soluong'] ?></td>
                            <td><?php echo $value['giathanh']." VNĐ" ?></td>
                            <td><?php echo $value['tongtien']." VNĐ" ?></td>
                            
                        </tr>
                    <?php 
                       
                        endforeach; ?>
                      
                    </tbody>
                </table>
            </div>
			<div id=""  >
                <table>
                    <tbody>
                       <tr>
                            <td style="font-weight: bold;">Tổng tiền hoá đơn
                                <?php 
                                foreach ($detailBcc as $key => $value):?>
                                <?php echo $value['mahoadonxuat'] ?>:
                                <?php endforeach; ?>
                             </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php 
                                    $tonghoadon =0;
                                    foreach($detailBcx as $key => $value):
                                        $tonghoadon = $tonghoadon +$value['tongtien'];
                                    endforeach;
                                    echo $tonghoadon." VNĐ";
                                ?>
                            </td>
                       </tr> 
                         
                    </tbody>
                </table>
            </div>
             <div id="butDiv">
                   <a href="<?= base_url() ?>index.php/baocao/baocaox/baocaox_view">Quay lại</a>
                
            </div>
</body>
</html>
