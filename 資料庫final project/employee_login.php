<?php
session_start();
unset($_SESSION['employee_name']);
unset($_SESSION['employee_pw']);
unset($_SESSION['employee_store']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>登入</title>
    <style>
        html {
            background-color: #d2f4d2; /* Light green background color */
        }
        body {
            background: rgba(210, 244, 210, 0.9); /* Light green background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: rgba(255, 255, 255, 0.6);
            padding: 20px;
            border-radius: 10px;
        }
        .btn-outline-black {
            color: black;
            border-color: black;
        }
        .btn-outline-black:hover {
            color: white;
            background-color: black;
            border-color: black;
        }
    </style>
</head>
<body>
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
</body>
</html>