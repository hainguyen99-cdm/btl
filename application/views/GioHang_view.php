<?php
include('header.php');
?>
<div class="BGio">
    <div>
        <form action="<?= base_url() ?>index.php/thanhtoan/ThanhToan_Controller/test" method="post">
            <div class="DanhSachSP">
				<h3>Sản phẩm chờ xuất</h3>
                <table>
                    <tr>
                        <th class="ASP">Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Nhà cung cấp</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($info as $value) : ?>
                        <tr>
                            <td style="width: 5%;"><img src="<?= base_url() ?>public/css/img/<?= $value['anh']?>" alt=""></td>
                            <td style="width: 30%;"><?= $value['tensanpham']?></td>
                            <td style="width: 10%;"><?= $value['loaisanpham']?></td>
                            <td style="width: 15%;"><?= $value['giathanh']?></td>
                            <td style="width: 15%;"><?= $value['manhacungcap']?></td>
                            <td style="width: 10%;">
                                <input aria-label="quantity" class="input-qty" max="<?= $value['soluong']?>" min="1" name="SL" type="number" value="" id="<?= $value['masanpham']?>" onclick="ChangeSL('<?= $value['masanpham']?>')">
                            </td>
                            <td style="width: 15%;" class="sp1" id="Tien<?= $value['masanpham']?>"></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="TTgui">
				
			<?php foreach ($info as $value) { ?>
				<input name="info1[]" type="hidden" value="<?php echo $value['masanpham']; ?>">
			<?php }  ?>
                <input type="hidden" name="listMSP[]" id="ListMSP" value="<?php echo "<pre>"; print_r($info); ?>" >
				<input type="hidden" name="TienTungSP" id="TienTungSP" value="" >
				<input type="hidden" name="SLTungSP" id="SLTungSP" value="" >
            </div>
            <div class="TongTien">
                <h2>Tổng tiền:</h2>
                <input type="text" class="input-value" name="TongTien" id="TongTien1" readonly>
            </div>
			<div id="khachhangForm">
					<div>
						<h3>Nhập thông tin khách hàng</h3>
						<div id="account">
							
							<div>
								<label for="tenkhachhang">Nhập tên Khách Hàng</label>
								<input name="tenkhachhang" type="text" id="tenkhachhang" placeholder="Nhập tên khách hàng">
							</div>
							<span class="notificationError">
								<?php 
									if(isset($accError)){
									echo $accError;
								}
								?>
							</span>
							<div>
								<label for="sodienthoai">Nhập số điện thoại</label>
								<input name="sodienthoai" type="text" id="sodienthoai" placeholder="Nhập số điện thoại">
							</div>
						
							<div>
								<label for="email">Nhập email</label>
								<input name="email" type="text" id="email"  placeholder="Nhập email">
							</div>
							<div>
								<label for="mahoadonxuat">Mã hóa đơn xuất</label>
								<input name="mahoadonxuat" type="text" id="mahoadonxuat" placeholder="Nhập mã hóa đơn xuất">
							</div>
							<span class="notificationError">
								<?php 
									if(isset($hdxError)){
									echo $hdxError;
								}
								?>
							</span>
							<div>
								<label for="ngayxuat">Ngày xuất hàng</label>
								<input name="ngayxuat" type="date" id="ngayxuat" ">
							</div>
						</div>
						<span class="notificationError">
							<?php 
								if(isset($lack)){
								echo $lack;
							}
							?>
						</span>
					</div>
			</div>
			<div id="butDiv">
							<a href="<?= base_url() ?>index.php/SP/SP_Controller/ShowSP">Quay lại</a>
							<button type="submit">Hoàn tất xuất hàng</button>
			</div>
           
        </form>
    </div>
</div>
<?php
// print_r($info);
?>
<!-- javascript -->
<script>
    var m = <?php echo json_encode($info); ?>;
    // console.log(m[0]["masanpham"]);
    var Tien = [];
	var SLMua = [];

    function ChangeSL(msp) {
        var TongGia = 0;
        var x = document.getElementById(msp);
        //lsp = jQuery.parseJSON($record);
        for (i = 0; i < m.length; i++) {
            if (m[i]["masanpham"] == msp) {
                Tien[i] = x.value * m[i]["giathanh"];
                tsp = 'Tien' + msp;
                y = document.getElementById(tsp);
                y.innerHTML = Tien[i];
				SLMua[i]= x.value;
            }
        }
        console.log(Tien);
        for (i = 0; i < Tien.length; i++) {
            TongGia = TongGia + Tien[i];
        }
        var z = document.getElementById("TongTien1");
        z.value = TongGia;
		var t = document.getElementById("TienTungSP");
		t.value = Tien;
		var r = document.getElementById("SLTungSP");
		r.value = SLMua;
    }

</script>

</body>

</html>
