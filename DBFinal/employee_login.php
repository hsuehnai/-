<?php
session_start();
unset($_SESSION['employee_name']);
unset($_SESSION['employee_pw']);
unset($_SESSION['employee_store']);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script> <!--jQuery-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--SweetAlart-->

        <title>登入</title>
		<form
			id="form"
			class="form-signin"
			method="get"
			action="./employee_login_check.php" 
		>   
			<input
				name="employee_name" 
				type="text" 
				class="form-control" 
				placeholder="請輸入員工姓名" 
				required=""
			>
			<input
				name="employee_store"  
				type="text" 
				class="form-control" 
				placeholder="請輸入分店代號" 
				required=""
			>
            <input
				name="employee_pw"  
				type="password" 
				class="form-control" 
				placeholder="請輸入員工密碼" 
				required=""
			>  		  
			<button 
				name="submit" 
				value="Login" 
				type="submit"
			><b>員工登入 Login</b></button>

			<h5><br> 還沒有帳號嗎? 馬上註冊 ↓<br> Have no account yet? Register now ↓</h5>
			<button 
   	 			onclick="window.location = './employee_register.php'"
  			><b>註冊 Register</b>
  			</button>
		</div>
		</form>			
	</div>
</div>
</html>
<style>
    html {
        background-image: url(../pictures/胸毛公寓.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }

    body {
        background: rgba(255, 255, 255, 0.3);
    }

    .card {
        background: rgba(255, 255, 255, 0.6);
    }
</style>