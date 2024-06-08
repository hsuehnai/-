<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>登入主頁</title>
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
  	<h5><small>歡迎來到超貴的健康飲食餐館</small></h5>
  	<h5><small>請選擇您的身分!</small></h5>
  	</div>

	<ul class="nav nav-tabs">
    		<li class="nav-item">
      		<a class="nav-link" href="#employee">我是員工</a>
    		</li>
    		<li class="nav-item">
      		<a class="nav-link" href="#customer">我是客人</a>
    		</li>
  	</ul>

	<div id="employee" class="container tab-pane fade"><br>
      	<h3>員工登入</h3>
	<?php
		session_start();
		unset($_SESSION['employee_name']);
		unset($_SESSION['employee_pw']);
		unset($_SESSION['employee_store']);
	?>
    	<div class="container">
        	<div class="row justify-content-center">
            		<div class="col-md-6 col-lg-4">
               			<div class="card">
                    		<form id="form" class="form-signin" method="get" action="./employee_login_check.php">
                        		<div class="mb-3">
                            			<input name="employee_name" type="text" class="form-control" placeholder="請輸入員工姓名" required="">
                        		</div>
                        		<div class="mb-3">
                            			<input name="employee_store" type="text" class="form-control" placeholder="請輸入分店代號" required="">
                        		</div>
                        		<div class="mb-3">
                            			<input name="employee_pw" type="password" class="form-control" placeholder="請輸入員工密碼" required="">
                        		</div>
                        		<div class="d-grid">
                           			<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" name="submit" value="Login" type="submit"><b>員工登入 Login</b></button>
                        		</div>
                        		<h5 class="mt-3 text-center">還沒有帳號嗎? 馬上註冊 ↓<br>Have no account yet? Register now ↓</h5>
                        		<div class="d-grid">
                            			<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" type="button" onclick="window.location = './employee_register.php'"><b>註冊 Register</b></button>
                        		</div>
                    		</form>
               			</div>
           		</div>
        	</div>
    	</div>
	</div>

	<div id="customer" class="container tab-pane fade"><br>
      	<h3>客戶登入</h3>
	<?php
		session_start();
		unset($_SESSION['cust_name']);
		unset($_SESSION['cust_pw']);
		
	?>
    	<div class="container">
        	<div class="row justify-content-center">
            		<div class="col-md-6 col-lg-4">
               			<div class="card">
                    		<form id="form" class="form-signin" method="get" action="./cust_login_check.php">
                        		<div class="mb-3">
                            			<input name="cust_name" type="text" class="form-control" placeholder="請輸入客戶姓名" required="">
                        		</div>
                                        <div class="mb-3">
                            			<input name="cust_pw" type="password" class="form-control" placeholder="請輸入客戶密碼" required="">
                        		</div>
                        		<div class="d-grid">
                           			<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" name="submit" value="Login" type="submit"><b>客戶登入 Login</b></button>
                        		</div>
                        		<h5 class="mt-3 text-center">還沒有帳號嗎? 馬上註冊 ↓<br>Have no account yet? Register now ↓</h5>
                        		<div class="d-grid">
                            			<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" type="button" onclick="window.location = './employee_register.php'"><b>註冊 Register</b></button>
                        		</div>
                    		</form>
               			</div>
           		</div>
        	</div>
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
  	<h5>還沒註冊過嗎?</h5>
  	<h5>點此來註冊吧!</h5>
	<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" type="button" onclick="window.location = './register.php'"><b>註冊 Register</b></button>
	</div>

	</body>

</html>