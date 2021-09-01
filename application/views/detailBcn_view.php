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
                <li><a href="<?= base_url() ?>index.php/baocao/baocao/baocao_view">Quản lý báo cáo thống kê</a></li>
                <li><a href="<?= base_url() ?>index.php/baocao/baocaon/baocaon_view">Báo cáo hoá đơn nhập hàng</a></li>
                <li><a href="">Chi tiết báo cáo hoá đơn nhập</a></li>
            </ul>
           
        </div>
           <div id="content">
           
                <div id="importHisory">
                    <h3>BÁO CÁO HOÁ ĐƠN NHẬP HÀNG</h3>
                    <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Mã báo cáo</th>
                            <th>Tên báo cáo</th>
                            <th>Mã hoá đơn nhập</th>
                            <th>Mã tài khoản</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                       
                        foreach ($detailBc as $key => $value):?>
                       
                        <tr>
                           
                            <td><?php echo $value['mabaocao'] ?></td>
                            <td><?php echo $value['tenbaocao'] ?></td>
                            <td><?php echo $value['mahoadonnhap'] ?></td>
                            <td><?php echo $value['mataikhoan'] ?></td>

                        </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                    
                   
                </div>
            </div>

            <div id=""  >
                <table>
                    <tbody>
                       <tr>
                            <td style="font-weight: bold;">Tổng tiền hoá đơn
                                <?php 
                                foreach ($detailBc as $key => $value):?>
                                <?php echo $value['mahoadonnhap'] ?>:
                                <?php endforeach; ?>
                             </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php 
                                    $tonghoadon =0;
                                    foreach($detailBcn as $key => $value):
                                        $tonghoadon = $tonghoadon +$value['tongtien'];
                                    endforeach;
                                    echo $tonghoadon." VNĐ";
                                ?>
                            </td>
                       </tr> 
                         
                    </tbody>
                </table>
            </div>

            <div id="importHisory">
                <h3>CHI TIẾT HOÁ ĐƠN NHẬP HÀNG</h3>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Danh sách mã sản phẩm nhập</th>
                            <th>Ngày nhập</th>
                            <th>Số lượng</th>
                            <th>Giá thành </th>
                            <th>Tổng tiền sản phẩm</th>
                            <th>Nhà cung cấp	</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                       
							foreach ($detailBcn as $key => $value)
							{?>
							<tr>
								
								<td><?php echo $value['masanpham'] ?></td>
								<td><?php echo $value['ngaynhap'] ?></td>
								<td><?php echo $value['soluong'] ?></td>
								<td><?php echo $value['giathanh']." VNĐ" ?></td>
								<td><?php echo $value['tongtien']." VNĐ" ?></td>
								<td><?php echo $value['0'] ?></td>

                    	<?php } ?>
							</tr>
                    </tbody>
                </table>
            </div>
             <div id="butDiv">
                           <a href="<?= base_url() ?>index.php/baocao/baocaon/baocaon_view">Quay lại</a>
            </div>
         
</body>
</html>
