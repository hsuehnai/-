<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        body {
            background-color: #add8e6; /* Light blue background color */
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
        .btn-lightblue {
            background-color: rgba(173, 216, 230, 0.9); /* Light blue button color */
            border: none;
            color: black;
        }
        .btn-lightblue:hover {
            background-color: rgba(173, 216, 230, 1); /* Slightly darker light blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <form id="form" method="get" onsubmit="return false" action="cust_check.php">
                        <div id="registration" class="mb-3 text-center"><h3>會員註冊</h3></div>
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
                        <div class="d-grid">
                            <button id="create" class="btn btn-lightblue btn-lg">新增會員</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $("#form").submit(function(e) {
        var params = {
            username: $('#username').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
        };
        var query = jQuery.param(params);
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url + '?' + query,
            success: function(data) {
                if (data.includes('已註冊過')) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        html:data,
                    });
                }
                if (data.includes('會員新增成功')) {
                    Swal.fire({
                        icon: 'success',
                        title: 'OK',
                        text: '會員新增成功',
                        allowOutsideClick: false,
                        showCancelButton: false,
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'home.php'; //回到homepage.php
                        }
                    });
                }
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
    </script>
</body>
</html>
