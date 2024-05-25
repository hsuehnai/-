<?php
setcookie("login","",time()-3600,"/");
setcookie("employee_name","",time()-3600,"/");
setcookie("employee_id","",time()-3600,"/");
setcookie("employee_store","",time()-3600,"/");
setcookie('reg_date',"",time()-3600,'/');
setcookie('info',"",time()-3600,'/');
unset($_SESSION['pwd']);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js" integrity="sha512-8pbzenDolL1l5OPSsoURCx9TEdMFTaeFipASVrMYKhuYtly+k3tcsQYliOEKTmuB1t7yuzAiVo+yd7SJz+ijFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>註冊</title>
        <script>
            window.onload = function(){
                if(('<?=$_SERVER['QUERY_STRING']?>')==='error=employee_id_repeat')
                {
                    Swal.fire({
                        icon: 'error',
                        title: '此員工編號已被註冊過!',
                    })
                }
                            }
        </script>
    </head>
    <body>
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <form id="form" class="form-signin" method="get" action="register_check.php" onsubmit="return validateForm()">
                    <div class="col-6 mx-auto">
                        <div class="card h-100 justify-content-center bg-opacity-10">
                            <div class="card-header text-center">
                                <h2><b>Register</b></h2>
                            </div>
                            
                            <div class="card-body text-center d-flex justify-content-center flex-column ">
                                <h5>員工資料設定</h5>
                                <input type="text" name="employee_name" class="p-2 mb-3" placeholder="請輸入員工姓名">
                                <input type="text" name="employee_id" class="p-2 mb-3" placeholder="請輸入員工編號">
                                <input type="text" name="employee_store" class="p-2 mb-3" placeholder="請輸入就職分店代號">
                                <h5>首次密碼設定 (4個字元以上)</h5>
                                <input type="password" id="employee_pw" name="employee_pw" class="p-2 mb-3" placeholder="請輸入員工密碼">
                                <input type="password" id="employee_pw2" name="employee_pw" class="p-2 mb-3" placeholder="請確認員工密碼" autocomplete="Off">
                                <button type="button" class="btn btn-primary p-2" name="submit" value="Login" onclick="window.location ='./employee_login.php'" >註冊</button>
                            </div>
                                
                            <div class="card-footer text-center">
                                <h5>已有帳號嗎?點此<a href="./employee_login.php">登入</button></h5>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    function validateForm() {
        var x = document.forms["form"]["employee_pw"].value;
        var y = document.forms["form"]["employee_pw2"].value;
        if(x.length<4){
            Swal.fire({
                icon: 'warning',
                title: '密碼長度不足',
                text: '請輸入4個字元以上的密碼',
            })
            return false;
        }
        else if (x != y) {
            Swal.fire({
                icon: 'error',
                title: '密碼錯誤',
                text: '請確認兩次密碼是否輸入相同',
            })
            return false;
        }
        else {
            var pwd = document.getElementById('employee_pw');
            pwd.value=pwd.value.MD5();
            return true;
        }
    }
</script>

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
