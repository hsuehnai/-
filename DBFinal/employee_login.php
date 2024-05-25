<?php
setcookie("login","",time()-3600,"/");
setcookie("id","",time()-3600,"/");
setcookie("userID","",time()-3600,"/");
setcookie('reg_date',"",time()-3600,'/');
setcookie('nickname',"",time()-3600,'/');
setcookie('gender',"",time()-3600,'/');
setcookie('bith',"",time()-3600,'/');
setcookie('info',"",time()-3600,'/');
unset($_SESSION['pwd']);
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
        <script>
            window.onload = function(){
                if(('<?=$_SERVER['QUERY_STRING']?>')==='error=no_employee_id')
                {
                    Swal.fire({
                        icon: 'error',
                        title: '查無此帳號，請檢查有無錯別字或註冊新帳號',
                    })
                }
                else if(('<?=$_SERVER['QUERY_STRING']?>')==='error=wrong_employee_pw')
                {
                    Swal.fire({
                        icon: 'error',
                        title: '密碼錯誤',
                    })
                }
                else if(('<?=$_SERVER['QUERY_STRING']?>')==='register_success')
                {
                    Swal.fire({
                        icon: 'success',
                        title: '註冊成功!請重新登入',
                    })
                }
            }
        </script>
    </head>
    <body>
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <form id="form" class="form-signin" method="get" action="login_check.php" >
                    <div class="col-6 mx-auto">
                        <div class="card h-100 justify-content-center bg-opacity-10">
                            <div class="card-header text-center">
                                <h2><b>員工登入</b></h2>
                            </div>
                            
                            <div class="card-body text-center d-flex justify-content-center flex-column ">
                                <input type="text" name="employee_id" class="p-2 mb-3" placeholder="請輸入員工編號">
                                <input type="text" name="employee_store" class="p-2 mb-3" placeholder="請輸入分店代號">
                                <input type="password" name="employee_pw" class="p-2 mb-3"placeholder="請輸入員工密碼">
                                <button class="btn btn-primary p-2" name="submit" value="Login" type="submit">登入</button>
                            </div>
                                
                            <div class="card-footer text-center">
                                <h5>沒有帳號嗎?點此<a href="./employee_register.php">註冊</button></h5>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
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
