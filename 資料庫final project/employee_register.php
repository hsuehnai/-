<!DOCTYPE html>
<html>
<head>
    <title>註冊</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js" integrity="sha512-8pbzenDolL1l5OPSsoURCx9TEdMFTaeFipASVrMYKhuYtly+k3tcsQYliOEKTmuB1t7yuzAiVo+yd7SJz+ijFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: #d2f4d2; /* Light green background color */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.6);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
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
            <h5 class="form-text text-center mt-3">已註冊帳號？馬上登入 ↓<br>Already got an account? Login now ↓</h5>
            <button class="mx-auto button button1 btn btn-outline-dark btn-lg w-100" onclick="window.location = './employee_login.php'"><b>登入 Login</b></button>
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
                                window.location = './employee_login.php'
                            }
                        })
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        }
    });
</script>