<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>訂單 Place order</title>
  <?php session_start(); ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: rgba(173,216,230,0.9);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    form {
      text-align: center;
      padding-right: 20px; /* Add padding to the right side of the form */
    }
    h1 {
      border: none; /* Remove border around text */
      padding: 10px; /* Add padding inside the border */
      text-align: left; /* Align text to the left */
    }
    button {
      margin-top: 20px;
      width: 100px; /* Adjust the width as needed */
      height: 50px; /* Adjust the height as needed */
      border-radius: 5px; /* Add rounded corners */
    }
  </style>
</head>
<body>
  <h1>請輸入訂單資料！ <br> Please insert data to place order!</h1>
  <form 
    id="form"
    method="get"
    onsubmit="return false"
    action="./order_check.php"
  >
    <div>
      <p id="odate_input"><b>請輸入訂單日期</b></p>
      <input 
        id="o_date"
        type="date"
        class="input"
        required=""
      >
    </div>
    <div>
      <p id="ocust_input"><b>請輸入會員編號</b></p>
      <input 
        id="o_cust"
        type="text"
        class="input"
        placeholder="Customer's ID number"
        required=""
      >
    </div>
    <div>
      <p id="onum_input"><b>請輸入訂購餐點數量</b></p>
      <input 
        id="o_num"
        type="text"
        class="input"
        placeholder="Order Quantity"
        required=""
      >
    </div>
    <div>
      <p id="ostore_input"><b>請輸入分店編號</b></p>
      <input 
        id="o_store"
        type="text"
        class="input"
        placeholder="Store's ID number"
        required=""
      >
    </div>
    <button
      value="Order"
      type="submit"
    ><b>下單 Order</b></button>
  </form>
</body>
<script>
$("#form").submit(function(e) {
  var params = {
    ord_date: $('#o_date').val(),
    ord_cust: $('#o_cust').val(),
    ord_num: ($('#o_num').val()),
    ord_store: ($('#o_store').val()),
  };
  var query = jQuery.param(params);
  var form = $(this);
  var url = form.attr('action');
  $.ajax({
    type: "GET",
    url: url + '?' + query,
    success: function(data) {
      if (data.includes('已成功下單')) {
        Swal.fire({
          icon: 'success',
          title: '已成功下單！',
          text: 'Order has been placed sucessfully !',
          allowOutsideClick: false,
          showCancelButton: false,
        }).then((result) => {
          if (result.value) {
            window.location = './home.php' //back to homepage
          }
        })
      }
    }
  });
  e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
</html>