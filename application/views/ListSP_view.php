<?php
include('header.php');
?>
<div id="padthDiv" class="container" >
	<ul class="path">
		<li><a href="<?= base_url() ?>index.php/home/home/load_home">Quản lý kho hàng</a></li>
		<li><a href="<?= base_url() ?>index.php/SP/SP_Controller/ShowSP">Danh sách hàng hóa</a></li>
	</ul>
</div>
<div class="BList">
    <div class="sidebarList" id="sidebarList">
		
       
    </div>
    <div class="contentList">
        <div class="GioL">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <p id="tongG">0</p>
            <div class="ListGio">
                <form action="<?= base_url() ?>index.php/SP/SP_Controller/showGio" method="post">
                    <table id="x" class="x">
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên mặt hàng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </table>
                    <div id="masp" class="masp"></div>
                    <button type="submit" class="button button2">Tiếp tục</button>
                </form>
            </div>
        </div>
       
        <div class="ListL" id='ListL'>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script>
    var GioHang = [];
    var MaSP = [];
    var SL = [];
    GioHang = [{
        MaSP,
        SL
    }];
    var hp = [];
    $(document).ready(function() {
        $.post('<?= base_url() ?>index.php/SP/SP_Controller/ajaxShowSP', {}, function(data) {
            hp = jQuery.parseJSON(data);
            var html = '';
            for (i = 0; i < hp.length; i++) {
                if(hp[i].soluong>0){
					html = html + '<div class="itemL">' +
						'<img src="<?= base_url() ?>public/css/img/' + hp[i].anh + '" alt="">' +
						'<div class="infoL">' +
						'<a href="#">' + hp[i].tensanpham + '</a>' +
						'<div class="Gia-SL">' +
						'<div class="GiaL">' +
						'<p>' + hp[i].giathanh + '₫ </p>' +
						'</div>' +
						'<div class="SoLuongL">' +
						'<p>Số lượng:' + hp[i].soluong + '</p>' +
						'</div>' +
						'</div>' +
						'</div>' +
						'<div class="SuaXoaL">' +
						'<div class="SuaL"><a href="<?= base_url() ?>index.php/SP/SP_Controller/suaSP?data=' + hp[i].masanpham + '"> Sửa </a></div>' +
						'<div class="XoaL"><a href="#" data-info="' + hp[i].masanpham + '"> + Giỏ </a></div>' +
						'</div>' +
						'</div>';
			   }
			   else{	
				html = html + '<div class="itemL outOfStock">' +
						'<div class="oosImg">' +
						'<img src="<?= base_url() ?>public/css/img/' + hp[i].anh + '" alt="">' +
						'</div>' +
						'<div class="infoL">' +
						'<a href="#">' + hp[i].tensanpham + '</a>' +
						'<div class="Gia-SL">' +
						'<div class="GiaL">' +
						'<p>' + hp[i].giathanh + '₫ </p>' +
						'</div>' +
						'<div class="SoLuongL">' +
						'<p> Hết hàng </p>' +
						'</div>' +
						'</div>' +
						'</div>' +
						'<div class="SuaXoaL">' +
						'</div>' +
						'</div>';
			   }
            }
            $('#ListL').html(html);

			//số lượng các mặt hàng trong kho
            var SLT = 0;
            var SLH = 0;
            var SLS = 0;
            var SLP = 0;
            for (i = 0; i < hp.length; i++) {
                if (hp[i].loaisanpham == 'tee') {
                    SLT = SLT + Number(hp[i].soluong);
                    console.log(hp[i].soluong)
                } else if (hp[i].loaisanpham == 'hoodie') {
                    SLH = SLH + Number(hp[i].soluong);
                    console.log(hp[i].soluong)
                } else if (hp[i].loaisanpham == 'shirt') {
                    SLS = SLS + Number(hp[i].soluong);
                    console.log(hp[i].soluong)
                } 
				else if (hp[i].loaisanpham == 'pants') {
                    SLP = SLP + Number(hp[i].soluong);
                    console.log(hp[i].soluong)
                }
				else {
                   continue;
                }
            }
            TongSL = SLT + SLH + SLS + SLP;
            
            htmlSL = '<h2>Tổng số hàng trong kho: '+TongSL+'</h2>\n' +
                '        <h2>Các loại sản phẩm:</h2>\n' +
                '        <ul>\n' +
                '            <li>Tee: '+SLT+'</li>\n' +
                '            <li>Hoodie: '+SLH+'</li>\n' +
                '            <li>Shirts: '+SLS+'</li>\n' +
                '            <li>Pants: '+SLP+'</li>\n' +
                '        </ul>';
                console.log(htmlSL);
            $('#sidebarList').html(htmlSL);

            //click chọn sản phẩm
            $('.XoaL a').on('click', function() {
                var x = $(this).data('info');
                if (MaSP.indexOf(x) >= 0) {
                    SL[MaSP.indexOf(x)] += 1;
                } else {
                    MaSP.push(x);
                    SL.push(1);
                }
                var html1 = '<tr>\n' +
                    '<th>Ảnh SP</th>\n' +
                    '<th>Tên mặt hàng</th>\n' +
                    '<th>Xóa</th>\n' +
                    '</tr>';
                for (i = 0; i < MaSP.length; i++) {
                    for (j = 0; j < hp.length; j++) {
                        if (MaSP[i] == hp[j].masanpham) {
                            // console.log(MaSP[i], hp[j].tensanpham, SL[i]);
                            html1 = html1 + '<tr>\n' +
                                '<td class="anhsp"><img src="<?= base_url() ?>public/css/img/' + hp[j].anh + '" alt=""></td>\n' +
                                '<td><input type="text" class="TenSP" name="TenSP" value="' + hp[j].tensanpham + '" readonly></td>\n' +
                                '<td><div><a class="xoag" href="#" onclick=Xoa("' + hp[j].masanpham + '")> Xóa </a></div></td>\n' +
                                '</tr>';
                        }
                    }
                }
                hideip = '<input type="hidden" name="LMaSP" value="' + MaSP + '">';
                $('#masp').html(hideip);
                $('#x').html(html1);
                $('#tongG').html(MaSP.length);
            });
        });




        //click xóa sản phẩm trong giỏ
        $('.xoag').on('click', function() {
            console.log($(this).data('info'));

        });

    });

    function Xoa(x) {
        console.log(MaSP);
        console.log(hp)
        console.log(MaSP.indexOf(x))
        if (MaSP.indexOf(x) >= 0) {

            MaSP.splice(MaSP.indexOf(x), 1);
            SL.splice(MaSP.indexOf(x), 1);
        }
        console.log(MaSP);
        var html1 = '<tr>\n' +
            '<th>Ảnh SP</th>\n' +
            '<th>Tên mặt hàng</th>\n' +
            '<th>Xóa</th>\n' +
            '</tr>';
        for (i = 0; i < MaSP.length; i++) {
            for (j = 0; j < hp.length; j++) {
                if (MaSP[i] == hp[j].masanpham) {
                    console.log(MaSP[i], hp[j].tensanpham, SL[i]);
                    html1 = html1 + '<tr>\n' +
                        '<td class="anhsp"><img src="<?= base_url() ?>public/css/img/' + hp[j].anh + '" alt=""></td>\n' +
                        '<td><input type="text" class="TenSP" name="TenSP" value="' + hp[j].tensanpham + '" readonly></td>\n' +
                        '<td><div><a class="xoag" href="#" onclick=Xoa("' + hp[j].masanpham + '")> Xóa </a></div></td>\n' +
                        '</tr>';
                }
            }
        }
        hideip = '<input type="hidden"  name="LMaSP" value="' + MaSP + '">';
        $('#masp').html(hideip);
        $('#x').html(html1);
        $('#tongG').html(MaSP.length);
    }
</script>

</body>

</html>
