<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
    <link rel="stylesheet" href="<?= base_url() ?>\public\css\Import.css" type=text/css>
    <title>Sửa sản phẩm</title>
</head>

<body>
    <?php include("header.php");  ?>
    <div id="contentDiv" class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/home/home/load_home">Quản lý kho hàng</a></li>
                <li><a href="<?= base_url() ?>index.php/SP/SP_Controller/suaSP">Sửa sản phẩm</a></li>
            </ul>
           
        </div>
        <div id="content">
            <form action="<?= base_url() ?>index.php/SP/SP_Controller/luuSP" method="post" enctype="multipart/form-data">
                <div id="productForm">
                    <h3>Nhập thông tin sản phẩm</h3>
                    <div id="product">
                    <?php foreach ($info as $x) : ?>
                        <div>
                            <input type="hidden" name="masanpham" id="masanpham" placeholder="Nhập mã sản phẩm" value="<?php echo $x['masanpham']; ?>">
                        </div>
                        <div>
                            <label for="tensanpham">Nhập tên sản phẩm</label>
                            <input name="tensanpham" type="text" id="tensanpham" placeholder="Nhập tên sản phẩm" value="<?php echo $x['tensanpham']; ?>">
                        </div>
                        <div>
                            <label for="loaisanpham">Nhập loại sản phẩm</label>
                            <input name="loaisanpham" type="text" id="loaisanpham" placeholder="Nhập loại sản phẩm" value="<?php echo $x['loaisanpham']; ?>">
                        </div>
                        <div>
                            <label for="giathanh">Nhập giá thành</label>
                            <input name="giathanh" type="number" id="giathanh" placeholder="Nhập giá sản phẩm" value="<?php echo $x['giathanh']; ?>">
                        </div>
                        <div>
                            <label for="manhacungcap">Chọn nhà cung cấp</label>
                            <select name="manhacungcap" id="manhacungcap">
                                <?php foreach ($chonnhacungcap as $key => $value) : ?>
                                    <option value="<?php echo $value['manhacungcap']; ?>">
                                        <?php echo $value['manhacungcap']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="soluong">Nhập số lượng</label>
                            <input name="soluong" type="number" id="soluong" placeholder="Nhập số lượng sản phẩm" value="<?php echo $x['soluong']; ?>">
                        </div>
                        <div>
                            <label for="imgFile">Image file</label>
                            <input name="anhmoi" id="imgFile" type="file">
							<input type="hidden" name="anhcu" value="<?php echo $x['anh'] ?>">
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
                <span class="error">
                    <?php
                    if (isset($lack)) {
                        echo $lack;
                    }
                    ?>
                </span>
                <div id="butDiv">
                    <a href="<?= base_url() ?>index.php/SP/SP_Controller/ShowSP">Quay lại</a>
                    <button type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <?php
    //print_r($info);
    ?> -->
</body>

</html>
