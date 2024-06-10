<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <title>註冊主頁</title>

  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
	</head>
	
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
        <form id="form_employee" method="get" action="./employee_register_check.php">
            <div>
                <h5>員工資料設定</h5>
                <input type="text" class="input form-control mb-3" id="employee_name" name="employee_name" placeholder="請輸入員工姓名" required="">
                <input type="text" class="input form-control mb-3" id="employee_store" name="employee_store" placeholder="請輸入就職分店代號" required="">
            </div>    
            <div>        
                <h5>首次密碼設定 (4個字元以上)</h5>
                <input id="employee_pw" name="employee_pw" type="password" class="input form-control mb-3" placeholder="請輸入員工密碼" required="">
                <input id="employee_pw2" name="employee_pw2" type="password" class="input form-control mb-3" autocomplete="Off" placeholder="請確認員工密碼" required="">
            </div>
            <button name="submit" value="Register" type="submit" class="mx-auto button button1 btn btn-outline-dark btn-lg w-100" onclick="validateFormE()"><b>註冊 Register</b></button>
        </form>
    </div>
    </div>
    </div>
	<div id="customer" class="container tab-pane fade"><br>	
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <form id="form_customer" method="get" action="cust_register_check.php">
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
                            id="pw1" 
                            type="password" 
                            name="pw1"
                            class="form-control" 
                            required=""
                            >
                        </div>
			            <div class="mb-3">
                            <label for="email" class="form-label"><b>請確認密碼</b></label>
                            <input 
                            id="pw2" 
                            type="password" 
                            name="pw2"
                            class="form-control" 
                            required=""
                            >
                        </div>

                        <div class="d-grid">
                            <button id="create" name="submit" type="submit" class="btn btn-lightblue btn-lg" onclick="validateFormC()">新增客戶</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

	<div class="jumbotron text-center" style="margin-bottom:0">
  	<h5>已經註冊過了嗎?</h5>
  	<h5>點此來登入吧!</h5>
	<button class="btn btn-outline-black btn-lg" style="background-color: rgba(210, 244, 210, 0.9);" type="button" onclick="window.location = './login.php'"><b>登入 Login</b></button>
	</div>

<script>
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
            //var e_pw = document.getElementById('employee_pw');
            //e_pw.value=e_pw.value.MD5();
            //document.getElementById('form_employee').submit();
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
            //var c_pw = document.getElementById('cust_pw');
            //c_pw.value=c_pw.value.MD5();
            //document.getElementById('form_customer').submit();
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
</body>
</html>
