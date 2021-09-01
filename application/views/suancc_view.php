<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\addAcc.css" type=text/css>
    <title>Sửa nhà cung cấp</title>
</head>
<body>
    <?php include("header.php");  ?>
    <div class="container">
        <form action="<?= base_url() ?>index.php/nhacungcap/nhacungcap/modifyNcc" method="Post">
        
            <?php 
             if(isset($modifyNcc)){
            foreach ($modifyNcc as $key => $value):?>
            <div>
                <h3>Sửa đổi thông tin nhà cung cấp</h3>
                <div id="account">
                    <div>
                        <input type="hidden" name="manhacungcap" value="<?php echo $value['manhacungcap'] ?>">
                    </div>
                    <div>
                        <label for="tennhacungcap">Tên nhà cung cấp</label>
                        <input name="tennhacungcap"
                        value="<?php echo $value['tennhacungcap'] ?>"
                         type="text" id="tennhacungcap" placeholder="Nhập tên nhà cung cấp">
                    </div>
                    <span class="notificationError">
                    </span>
                    <div>
                        <label for="email">Email</label>
                        <input name="email"
                        value="<?php echo $value['email'] ?>"
                         type="text" id="email" placeholder="Nhập email">
                    </div>
                    
                </div>
                <span class="notificationError">
                </span>
                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/nhacungcap/nhacungcap/ncc_view">Quay lại</a>
                    <button type="submit">Sửa nhà cung cấp</button>
                </div>
            </div>
        <?php  endforeach; }?>
        </form>
    </div>
</body>
</html>
