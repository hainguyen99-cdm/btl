<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>
    <title>Thêm nhà cung cấp</title>
</head>
<body>
	<?php include("header.php");  ?>
    <div class="container">
        <form action="<?= base_url() ?>index.php/nhacungcap/nhacungcap/addNcc" method="Post">
            <div>
                <h3>Nhập thông nhà cung cấp</h3>
                <div id="account">
                    <div>
                        <label for="manhacungcap">Nhập mã nhà cung cấp</label>
                        <input name="manhacungcap" type="text" id="manhacungcap" placeholder="Nhập mã nhà cung cấp">
						<span class="notificationError">
							<?php 
								if(isset($idError)){
								echo $idError;
							}
							?>
						</span>
                    </div>
                    <div>
                        <label for="tennhacungcap">Nhập tên nhà cung cấp</label>
                        <input name="tennhacungcap" type="text" id="tennhacungcap" placeholder="Nhập tên nhà cung cấp">
                    </div>
					<span class="notificationError">
						<?php 
							if(isset($nccError)){
							echo $nccError;
						}
						?>
					</span>
                    <div>
                        <label for="email">Nhập email</label>
                        <input name="email" type="email" id="email" placeholder="Nhập email">
						
                    </div>
					<span class="notificationError">
						<?php 
							if(isset($emailError)){
							echo $emailError;
						}
						?>
					</span>
                    

                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/nhacungcap/nhacungcap/ncc_view">Quay lại</a>
                    <button type="submit">Thêm nhà cung cấp</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
