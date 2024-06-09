<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>註冊主頁</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	</head>
	<?php
		session_start();
	?>

	<body>
	<div class="jumbotron text-left" style="margin-bottom:0" >
  	<h5><small>歡迎加入超貴的健康飲食餐館</small></h5>
  	<h5><small>請選擇您的身分!</small></h5>
  	</div>

	<ul class="nav nav-tabs">
    		<li class="nav-item">
      		<a class="nav-link" href="#employee">我是新員工</a>
    		</li>
    		<li class="nav-item">
      		<a class="nav-link" href="#customer">我是新客人</a>
    		</li>
  	</ul>

	<div class="tab-content border mb-3">
	<div id="employee" class="container tab-pane fade"><br>
      	<h3>員工註冊</h3>
	<div class="container">
        <form id="form" onsubmit="return false" action="./employee_register_check.php">
            <div>
                <h5>員工資料設定</h5>
                <input type="text" class="input form-control mb-3" id="employee_name" placeholder="請輸入員工姓名" required="">
                <input type="text" class="input form-control mb-3" id="employee_store" placeholder="請輸入就職分店代號" required="">
            </div>    
            <div>        
                <h5>首次密碼設定 (4個字元以上)</h5>
                <input id="employee_pw" type="password" class="input form-control mb-3" placeholder="請輸入員工密碼" required="">
                <input id="employee_pw2" type="password" class="input form-control mb-3" autocomplete="Off" placeholder="請確認員工密碼" required="">
            </div>
            <button name="submit" value="Register" type="submit" class="mx-auto button button1 btn btn-outline-dark btn-lg w-100"><b>註冊 Register</b></button>
        </form>
    </div>
</body>
</html>

<script>
    $("#form").submit(function(e) {
        if ($("#employee_pw").val() !== $("#employee_pw2").val()) {
            Swal.fire({
                icon: 'warning',
                title: '請再確認一次密碼！',
                text: 'Please confirm the password again !',
            });
            return;
        } else {
            var params = {
                employee_name: $('#employee_name').val(),
                employee_store: $('#employee_store').val(),
                employee_pw: ($('#employee_pw').val()),
            };
            var query = jQuery.param(params);
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "GET",
                url: url + '?' + query,
                success: function(data) {
                    if (data.includes('已註冊過')) {
                        Swal.fire({
                            icon: 'warning',
                            title: '請重新輸入資料！',
                            html: 'Please re-enter the data! <br><br>' + data,
                        });
                    }
                    if (data.includes('員工新增成功')) {
                        Swal.fire({
                            icon: 'success',
                            title: '員工新增成功！',
                            text: 'Employee Inserted Successfully !',
                            allowOutsideClick: false,
                            showCancelButton: false,
                        }).then((result) => {
                            if (result.value) {
                                window.location = './login.php'
                            }
                        })
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        }
    });
</script>
	</div>

	<div id="customer" class="container tab-pane fade"><br>
      	
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <form id="form" method="get" onsubmit="return false" action="cust_register_check.php">
                        <div id="registration" class="mb-3 text-center"><h3>客戶註冊</h3></div>
                        <div class="mb-3">
                            <label for="username" class="form-label"><b>請輸入姓名</b></label>
                            <input 
                            id="username" 
                            type="text" 
                            name="username"
                            class="form-control" 
                            required=""
                            >
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><b>請輸入電話</b></label>
                            <input 
                            id="phone" 
                            type="text" 
                            name="phone"
                            class="form-control" 
                            required=""
                            >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>請輸入EMAIL</b></label>
                            <input 
                            id="email" 
                            type="email" 
                            name="email"
                            class="form-control" 
                            required=""
                            >
                        </div>
			<div class="mb-3">
                            <label for="email" class="form-label"><b>請輸入密碼</b></label>
                            <input 
                            id="pw" 
                            type="password" 
                            name="pw"
                            class="form-control" 
                            required=""
                            >
                        </div>

                        <div class="d-grid">
                            <button id="create" class="btn btn-lightblue btn-lg">新增客戶</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $("#form").submit(function(e) {
        var params = {
            username: $('#username').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
        };
        var query = jQuery.param(params);
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url + '?' + query,
            success: function(data) {
                if (data.includes('已註冊過')) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        html:data,
                    });
                }
                if (data.includes('客戶新增成功')) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '客戶新增成功',
                        allowOutsideClick: false,
                        showCancelButton: false,
                    }).then((result) => {
                        if (result.value) {
                            window.location = './login.php'; 
                        }
                    });
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
    </script>
	</div>
	</div>


	<script>
	$(document).ready(function(){
  		$(".nav-tabs a").click(function(){
    			$(this).tab('show');
  		});
  		$('.nav-tabs a').on('shown.bs.tab', function(event){
    			var x = $(event.target).text();         // active tab
    			var y = $(event.relatedTarget).text();  // previous tab
    			$(".act span").text(x);
    			$(".prev span").text(y);
  		});
	});
	</script>

	<div class="jumbotron text-center" style="margin-bottom:0">
  	<h5>已經註冊過了嗎?</h5>
  	<h5>點此來登入吧!</h5>
	<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" type="button" onclick="window.location = './login.php'"><b>登入 Login</b></button>
	</div>

	</body>

</html>
