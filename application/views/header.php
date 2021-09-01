<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\header.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\listSP.css" type=text/css>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/GioHang.css" type=text/css>
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php 
	if(isset($_SESSION ['ok'])){
		$name = $_SESSION ['ok'];
	}else{
		  header('Location: http://localhost/quanlykho/');
	}
?>
<body>
    <header >
      <div class="container">
            <div id="adminBar">
                <h1>
                    <a href="<?= base_url() ?>index.php/home/home/load_home">
                        <img src="<?= base_url() ?>\public\css\img\logo.png" alt="logo">
                    </a>
                </h1>
                <div>
					<?php 
					if($name[0]['loaitaikhoan']=='admin')
					{	
				
						echo '<div><a href="'.base_url().'index.php/admin/admin/admin_view">Quản lý hệ thống</div>';

					}
					?>
                    <div><a href="#">
					<?php 
					
					echo $name[0]['taikhoan'];
					echo " - ";
					echo $name[0]['loaitaikhoan'];

					?>
					</a></div>
                    <div><a href="<?= base_url() ?>index.php/admin/login/logout">Đăng xuất</a></div>
                </div>
            </div>
            <div id="functionBar">
                <ul>
                    <li><a href="<?= base_url() ?>index.php/home/home/load_home"> Quản lý kho hàng</a></li>
                    <li><a href="<?= base_url() ?>index.php/dskhachhang/dskhachhang/dsKhachHang_view"> Quản lý khách hàng</a></li>
                    <li><a href="<?= base_url() ?>index.php/nhacungcap/nhacungcap/ncc_view"> Quản lý nhà cung cấp</a></li>
                    <li><a href="<?= base_url() ?>index.php/baocao/baocao/baocao_view"> Quản lý Báo cáo thống kê</a></li>
                </ul>
                <div id="searchBar">
                    <input type="text">
                    <button>Tìm kiếm</button>
                </div>
            </div>
      </div>
    </header>
</body>

</html>
