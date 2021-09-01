<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\path.css" type=text/css>
	<link rel="stylesheet" href="<?= base_url() ?>\public\css\admin.css" type=text/css>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>API_view</title>
</head>
<body>
	<?php include("header.php");  ?>
	<div class="container">
        <div id="padthDiv">
            <ul class="path">
                <li><a href="<?= base_url() ?>index.php/admin/admin/admin_view">Quản lý hệ thống</a></li>
                <li><a href="<?= base_url() ?>index.php/api/testApi/api_view">Danh sách nhân viên sở hữu tài khoản</a></li>
            </ul>
        </div>
        <div id="accountList">
            <h3>Danh sách nhân viên sở hữu tài khoản</h3>
            <table class="styled-table">
                <thead>
                    <tr>
						<th>Số thứ tự</th>
                        <th>Họ tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Chức vụ</th>
                        <th>tài khoản</th>
                    </tr>
                </thead>
                <tbody>
					
                </tbody>
            </table>
        </div>
		<div id="butDiv">
                   <a href="<?= base_url() ?>index.php/admin/admin/admin_view">Quay lại</a>

        </div>
    </div>
</body>

<script type="text/javascript" language="javascript">
$(document).ready(function(){

	function fetch_data(){
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/api/testApi/action",	 
		
			method: "POST",
			data: {data_action:'fetch_all'},
			success:function(data){
				$('tbody').html(data);
			}
		});
	}

	fetch_data();

});
</script>
</html>
