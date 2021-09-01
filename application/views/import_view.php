<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\Import.css" type=text/css>
    <title>Nhập hàng</title>
</head>
<body>
	<?php include("header.php");  ?>
    <div id="contentDiv" class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/home/home/load_home">Quản lý kho hàng</a></li>
                <li><a href="<?= base_url() ?>index.php/import/import/import_view">Nhập hàng hóa</a></li>
            </ul>
            <div id="importLink">
                <a class="historyLink" href="<?= base_url() ?>index.php/import/import/waitImport_view">Đi đến hóa đơn nhập</a>
            </div>
        </div>
        <div id="content">
           <form action="<?= base_url() ?>index.php/import/import/waitImport"
			method="post"  
		   enctype="multipart/form-data">
				<div id="productForm">
					<h3>Nhập thông tin sản phẩm</h3>
					<div id="product">
						<div>
							<label for="masanpham">Nhập mã sản phẩm</label>
							<input type="text"
							name="masanpham"
							id="masanpham" placeholder="Nhập mã sản phẩm">
						</div>
						<div>
							<label for="tensanpham">Nhập tên sản phẩm</label>
							<input 
							name="tensanpham"
							type="text" id="tensanpham" placeholder="Nhập tên sản phẩm">
						</div>
						<div>
							<label for="loaisanpham">Nhập loại sản phẩm</label>
							<input
							name="loaisanpham"
							type="text" id="loaisanpham" placeholder="Nhập loại sản phẩm">
						</div>
						<div>
							<label for="giathanh">Nhập giá thành</label>
							<input
							name="giathanh"
							type="number" id="giathanh" placeholder="Nhập giá sản phẩm">
						</div>
						<div>
							<label for="tennhacungcap">Chọn nhà cung cấp</label>
							<select name="tennhacungcap" id="tennhacungcap">
							<?php foreach ($chonnhacungcap as $key => $value):?>  
								<option value="<?php echo $value['tennhacungcap']; ?>">
									<?php echo $value['tennhacungcap']; ?>
								</option> 
							<?php  endforeach; ?>
							</select>
                    	</div>
						<div>
							<label for="soluong">Nhập số lượng</label>
							<input 
							name="soluong"
							type="number" id="soluong" placeholder="Nhập số lượng sản phẩm">
						</div>
						<div>
							<label for="imgFile">Image file</label>
                        	<input name="anh" id="imgFile" type="file" class="form-control-file">
						</div>
					</div>
				</div>
					<span class="error">
					<?php 
						if(isset($lack)){
						echo $lack;
						}
					?>
					</span>
               <div id="butDiv">
                   <a href="<?= base_url() ?>index.php/home/home/load_home">Quay lại</a>
                   <button type="submit">Thêm vào hàng đợi</button>
               </div>
           </form>
        </div>
    </div>
</body>
</html>
   
