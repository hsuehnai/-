目前結果：

![image](https://github.com/hsuehnai/-/assets/162154266/f770bbb7-5093-475f-9dcc-498c4af40de4)

/*
第80行導回homepage，因為還沒有檔案，所以先註解
*/
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>會員註冊</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"
    ></script> <!--jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--SweetAlart-->
</head>

<body>
    <header></header>
    <form id="form" method="get" onsubmit="return false" action="cust_check.php">
        <div id="registration">會員註冊</div>
        <div>
            <p id="nameinput"><b>請輸入姓名</b></p>
            <input 
            id="username" 
            type="text" 
            name="username"
            class="input" 
            required=""
            >
        </div>
        <div>
            <p id="phoneinput"><b>請輸入電話</b></p>
            <input 
            id="phone" 
            type="text" 
            name="phone"
            class="input" 
            required=""
            >
        </div>
        <div>
            <p id="emailinput"><b>請輸入EMAIL</b></p>
            <input 
            id="email" 
            type="email" 
            name="email"
            class="input" 
            required=""
            >
        </div>
        <button id="create">新增會員</button>
    </form>
</body>

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
                    //window.location = 'homepage.php' //回到homepage.php
                    }
                })
            }
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
