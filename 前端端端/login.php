<?
	session_start();
	unset($_SESSION['employee_id']);
	unset($_SESSION['employee_name']);
	unset($_SESSION['employee_pw']);
	unset($_SESSION['cust_id']);
	unset($_SESSION['cust_name']);
	unset($_SESSION['cust_pw']);
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>登入主頁</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"
    ></script> <!--jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--SweetAlart-->

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  	<style>
		body {
      		background-color:#d2f4d2 ; /* 淺綠色 */
    	}
    	.top-jumbotron {
      		background-image: url('login.bg.png'); /* 替换为你上传的本地背景图片文件名 */
			  background-size: 100% auto;
      		background-repeat: no-repeat;
      		background-position: center;
			height: 200px; /* 适当调整高度 */
      		color: white;
      		text-align: center;
			display: flex;
      		align-items: center;
      		justify-content: center;
    	}
		.top-text {
            background-color: white; /* 白色背景 */
            padding: 10px; /* 添加一些内边距 */
            border-radius: 10px; /* 圆角边框 */
            margin-top: 0px; /* 调整顶部间距 */
			text-align: center; /* 文本置中 */
        }
    	.top-text h5 {
            font-family: 'Arial', sans-serif; /* 替换为你想要的字体 */
            font-size: 2em; /* 放大字体 */
            color: #008000; /* 深綠色 */
        }
		.nav-tabs, .tab-content, .container {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .nav-tabs {
            background-color: #244f24; /* 深綠色背景 */
        }
        .nav-tabs .nav-link {
            color: white; /* 白色字体 */
        }
    	.card {
    		margin-bottom: 100px; /* 在方格下方留出空隙 */
		}

		.bottom-jumbotron {
    		background-color: rgba(210, 244, 210, 0.9); /* 輕微調整 */
			height: 10px
    		
		}
        .register-btn {
   			background-color: #244f24; /* 深綠色背景 */
    		color: white; /* 白色字體 */
    		
		}

		
  	</style>
	</head>
	
	<body>
	<div class="jumbotron top-jumbotron text-left" style="margin-bottom:0;"></div>

	<div class="top-text">
  		<h5><small>歡迎來到超貴的健康飲食餐館</small></h5>
  		<h5><small>請選擇您的身分!</small></h5>
	</div>

	<ul class="nav nav-tabs">
    		<li class="nav-item">
      		<a class="nav-link" href="#employee">我是員工</a>
    		</li>
    		<li class="nav-item">
      		<a class="nav-link" href="#customer">我是顧客</a>
    		</li>
  	</ul>

	<div class="tab-content border mb-3">
    <div id="employee" class="container tab-pane fade"><br>
        <h3>員工登入</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <form id="form1" class="form-signin" method="get" action="./employee_login_check.php">
                            <div class="mb-3">
                                <input name="employee_name" type="text" class="form-control" placeholder="請輸入員工姓名" required="">
                            </div>
                            <div class="mb-3">
                                <input name="employee_pw" type="password" class="form-control" placeholder="請輸入員工密碼" required="">
                            </div>
                            <div class="d-grid">
							<div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" name="submit" value="Login" type="submit"><b>員工登入 Login</b></button>
                            </div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="customer" class="container tab-pane fade"><br>
        <h3>顧客登入</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <form id="form2" class="form-signin" method="get" action="./cust_login_check.php">
                            <div class="mb-3">
                                <input name="cust_name" type="text" class="form-control" placeholder="請輸入顧客姓名" required="">
                            </div>
                            <div class="mb-3">
                                <input name="cust_pw" type="password" class="form-control" placeholder="請輸入顧客密碼" required="">
                            </div>
                            <div class="d-grid">
							<div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" name="submit" value="Login" type="submit"><b>客戶登入 Login</b></button>
                            </div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
	window.onload = function(){
        if(('<?=$_SERVER['QUERY_STRING']?>')==='error=no_employee_name')
        {
            Swal.fire({
				icon: 'error',
				title: '查無此員工',
				text: '請檢查有無錯別字或註冊新帳號',
				})
		}
		else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=wrong_employee_pw')
		{
			Swal.fire({
				icon: 'error',
				title: '員工密碼錯誤',
				text: '請檢查有無錯別字',
			})
		}
		else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=no_cust_name')
        {
            Swal.fire({
                icon: 'error',
                title: '查無此客戶',
				text: '請檢查有無錯別字或註冊新帳號',
            })
        }
        else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=wrong_cust_pw')
        {
            Swal.fire({
                icon: 'error',
                title: '客戶密碼錯誤',
				text: '請檢查有無錯別字',
            })
        }
		else if(('<?=$_SERVER['QUERY_STRING']?>')==='register_success')
        {
            Swal.fire({
                icon: 'success',
                title: '註冊成功!',
				text: '請重新登入',
            })
        }
    }
</script>
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


<div class="jumbotron text-center bottom-jumbotron d-flex flex-column align-items-center justify-content-center" style="margin-bottom:0;">
    <div>
        <h5>請在左上角選擇您的身份進行登入</h5>
    </div>
    <div>
        <h5>還沒註冊過嗎?</h5>
    </div>
    <div>
        <button class="btn btn-outline-black btn-lg register-btn" type="button" onclick="window.location = './register.php'"><b>點此註冊 Register</b></button>
    </div>
</div>
</div>

</body>
</html> 
