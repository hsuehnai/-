<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <title>註冊主頁</title>

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
	

    <div class="tab-content border mb-3" style="background-color: #ffffe0;">
    <div id="employee" class="container tab-pane fade" style="background-color: #ffffe0;"><br>
        <h3 class="text-center">員工註冊</h3> 
        <div class="container" style="background-color: #ffffe0;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 " >
                <div class="card" style="background-color: rgba(210, 244, 210, 0.9);">
            <form id="form_employee" method="get" action="./employee_register_check.php">
                <div>
                    <h5>員工基本資料</h5>
                    <input type="text" class="input form-control mb-3" style="background-color: rgba(210, 244, 210, 0.9);" id="employee_name" name="employee_name" placeholder="請輸入員工姓名" required="">
                    <input type="text" class="input form-control mb-3" style="background-color: rgba(210, 244, 210, 0.9);" id="employee_store" name="employee_store" placeholder="請輸入就職分店代號" required="">
                </div>    
                <div>        
                    <h5>首次密碼設定 (4個字元以上)</h5>
                    <input id="employee_pw" name="employee_pw" type="password" class="input form-control mb-3" style="background-color: rgba(210, 244, 210, 0.9);" placeholder="請輸入員工密碼" required="">
                    <input id="employee_pw2" name="employee_pw2" type="password" class="input form-control mb-3" style="background-color: rgba(210, 244, 210, 0.9);" autocomplete="Off" placeholder="請確認員工密碼" required="">
                </div>
                <button name="submit" value="Register" type="submit" class="mx-auto button button1 btn btn-outline-white btn-lg w-100" style="background-color: #244f24; color: white;" onclick="validateFormE()"><b>註冊 Register</b></button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<div id="customer" class="container tab-pane fade" style="background-color: #ffffe0;"><br> 
    <h3 class="text-center">顧客註冊</h3>  
    <div class="container" style="background-color: #ffffe0;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card" style="background-color: rgba(210, 244, 210, 0.9)">
                    <form id="form_customer" method="get" action="cust_register_check.php">
                <div>
                    <h5>顧客姓名</h5>
                    <input type="text" class="input form-control mb-3" id="username" name="username" style="background-color: rgba(210, 244, 210, 0.9)" placeholder="請輸入姓名" required="">
                </div>
                <div>
                <h5>顧客電話</h5>
                    <input type="text" class="input form-control mb-3" id="phone" name="phone" style="background-color: rgba(210, 244, 210, 0.9)" placeholder="請輸入電話" required="">
                </div>
                <div>
                <h5>顧客Email</h5>
                    <input type="text" class="input form-control mb-3" id="email" name="email" style="background-color: rgba(210, 244, 210, 0.9)" placeholder="請輸入Email" required="">
                </div>
                <div>
                <h5>首次密碼設定（4個字元以上）</h5>
                    <input type="password" class="input form-control mb-3" id="pw1" name="pw1" style="background-color: rgba(210, 244, 210, 0.9)" placeholder="請輸入密碼" required="">
                </div>
                <h5>確認密碼</h5>
                    <input type="password" class="input form-control mb-3" id="pw2" name="pw2" style="background-color: rgba(210, 244, 210, 0.9)" placeholder="再輸入一次密碼" required="">
                    <button id="create" name="submit" type="submit" class="mx-auto button button1 btn btn-outline-dark btn-lg w-100" style="background-color: #244f24; color: white;" onclick="validateFormC()">註冊Register</button>
                </div>
                
                
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>



	

<script>
    document.addEventListener('DOMContentLoaded', (e) => {
        const form_e = document.getElementById('form_employee');
        const form_c = document.getElementById('form_customer');
        form_e.addEventListener('submit', function(e) {
            if (!validateFormE()) {
                e.preventDefault(); // 攔截表單
            }
        });
        form_c.addEventListener('submit', function(e) {
            if (!validateFormC()) {
                e.preventDefault(); // 攔截表單
            }
        });
    });
    function validateFormE() { //確認employee
        var a = document.forms["form_employee"]["employee_pw"].value;
        var b = document.forms["form_employee"]["employee_pw2"].value;
        if(a.length<4){
            Swal.fire({
                icon: 'warning',
                title: '密碼長度不足',
                text: '請輸入4個字元以上的密碼',
            })
            return false;
        }
        else if (a != b) {
            Swal.fire({
                icon: 'error',
                title: '密碼錯誤',
                text: '請確認兩次密碼是否輸入相同',
            })
            return false;
        }
        else {
            return true;
        }
    }
    function validateFormC() { //確認customer
        var w = document.forms["form_customer"]["pw1"].value;
        var z = document.forms["form_customer"]["pw2"].value;
        if(w.length<4){
            Swal.fire({
                icon: 'warning',
                title: '密碼長度不足',
                text: '請輸入4個字元以上的密碼',
            })
            return false;
        }
        else if (w != z) {
            Swal.fire({
                icon: 'error',
                title: '密碼錯誤',
                text: '請確認兩次密碼是否輸入相同',
            })
            return false;
        }
        else {
            return true;
        }
    }
    window.onload = function(){
        if(('<?=$_SERVER['QUERY_STRING']?>')==='error=employee_name_repeat')
        {
            Swal.fire({
                icon: 'error',
                title: '此員工名稱已被註冊過',
                text: '請確認員工名稱是否輸入錯誤或是更改成其他員工名稱',
            })
        }
        else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=customer_email_repeat')
        {
            Swal.fire({
                icon: 'error',
                title: '此電子郵件已被註冊過',
                text: '請確認電子郵件是否輸入錯誤或是更改成其它電子郵件',
            })
        }
        else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=customer_phone_repeat')
        {
            Swal.fire({
                icon: 'error',
                title: '此電話號碼已被註冊過',
                text: '請確認電話號碼是否輸入錯誤或是更改成其它電話號碼',
            })
        }
    }

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
        <h5>請在左上角選擇您的身份進行註冊</h5>
    </div>
  	<h5>已經註冊過了嗎?</h5>
	<button class="btn btn-outline-black btn-lg register-btn" style="background-color: #244f24;" type="button" onclick="window.location = './login.php'"><b>點此登入 Login</b></button>
	</div>

</body>
</html>
