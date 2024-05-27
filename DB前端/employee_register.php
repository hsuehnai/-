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
        html, body {
            height: 100%;
        }
        body {
            background-color: #d2f4d2; /* Light green background color */
            display: flex;
            justify-content: center;
            align-items: center;
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
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <form id="form" onsubmit="return false" action="./employee_register_check.php">
                        <div>
                            <h5>員工資料設定</h5>
                            <input type="text" class="form-control mb-3" id="employee_name" placeholder="請輸入員工姓名" required="">
                            <input type="text" class="form-control mb-3" id="employee_store" placeholder="請輸入就職分店代號" required="">
                        </div>
                        <div>
                            <h5>首次密碼設定 (4個字元以上)</h5>
                            <input id="employee_pw" type="password" class="form-control mb-3" placeholder="請輸入員工密碼" required="">
                            <input id="employee_pw2" type="password" class="form-control mb-3" autocomplete="Off" placeholder="請確認員工密碼" required="">
                        </div>
                        <button name="submit" value="Register" type="submit" class="btn btn-outline-black btn-lg w-100"><b>註冊 Register</b></button>
                        <h5 class="form-text text-center mt-3">已註冊帳號？馬上登入 ↓</h5>
                        <button class="btn btn-outline-black btn-lg w-100" onclick="window.location = './employee_login.php'"><b>登入 Login</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
