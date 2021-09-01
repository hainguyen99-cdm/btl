<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\Home.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>

    <title>Home Page</title>
</head>
<body>
	<?php 
		include("header.php");
	?>
    <div id="contentDiv" class="container">
        <div id="content">
            <div id="product">
                <img src="<?= base_url() ?>\public\css\img\hanghoa.png" alt="">
                <a href="<?= base_url() ?>index.php/SP/SP_Controller/ShowSP">Danh sách hàng hóa</a>
            </div>
            <div id="import">
                <img src="<?= base_url() ?>\public\css\img\nhapkho.png" alt="">
                <a href="<?= base_url() ?>index.php/import/import/import_view">Nhập hàng hóa</a>
            </div>
            <div id="export">   
                <img src="<?= base_url() ?>\public\css\img\xuatkho.png" alt="">
                <a href="<?= base_url() ?>index.php/SP/SP_Controller/ShowSP">Xuất hàng hóa</a>
            </div>  
        </div>
    </div>
</body>
</html>
