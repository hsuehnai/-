<!--輸入訂單：彈出明細-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>訂單 Place order</title>
  <?php 
    require_once dirname(__FILE__)."/db_check.php";
		session_start();
    $conn = db_check();
  ?>
    <div id="hello_message" style="background-color: #FFB6C1; padding: 10px; margin-bottom: 20px;">
      <?php echo "Hello,  " . $_SESSION['cust_name'] . "! " . "😄"; ?><!--確認顯示當前登入客戶名稱-->
    </div>
  <?php
    $cprice = "SELECT meal_price FROM meal WHERE meal_name = '雞肉'";
    $fprice = "SELECT meal_price FROM meal WHERE meal_name = '魚肉'";
    $pprice = "SELECT meal_price FROM meal WHERE meal_name = '豬肉'";
    $bprice = "SELECT meal_price FROM meal WHERE meal_name = '牛肉'";
    $cresult = mysqli_query($conn, $cprice);
    $fresult = mysqli_query($conn, $fprice);
    $presult = mysqli_query($conn, $pprice);
    $bresult = mysqli_query($conn, $bprice);

    if(mysqli_num_rows($cresult) > 0) {
      $row = mysqli_fetch_assoc($cresult);
      $c_price = $row["meal_price"];
    }
    if(mysqli_num_rows($fresult) > 0) {
      $row = mysqli_fetch_assoc($fresult);
      $f_price = $row["meal_price"];
    }
    if(mysqli_num_rows($presult) > 0) {
      $row = mysqli_fetch_assoc($presult);
      $p_price = $row["meal_price"];
    }
    if(mysqli_num_rows($bresult) > 0) {
      $row = mysqli_fetch_assoc($bresult);
      $b_price = $row["meal_price"];
    }
    $conn->close();
  ?>

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
      flex-direction: row; /* Display in a row */
    }
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px;
    }
    form {
      text-align: left; /* Align text to the left */
      padding-right: 20px; /* Add padding to the right side of the form */
      background-color: #FFFFE0; /* Light yellow background color */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      border: none; /* Remove border around text */
      padding: 10px; /* Add padding inside the border */
      text-align: center; /* Center the text */
    }
    button {
      margin: 20px auto; /* 將按鈕置中 */
      display: block; /* 將按鈕設置為區塊級元素 */
      margin-top: 20px;
      width: 120px; /* Adjust the width as needed */
      height: 80px; /* Adjust the height as needed */
      border-radius: 5px; /* Add rounded corners */
      font-size: 20px; /* Increase font size */
      background-color: #FFFF99; /* Light yellow background color */
    }
    .modal-content {
      background-color: #FFFFE0; /* Light yellow background color */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    #form p {
      text-align: left; /* Align text to the left */
    }
    #back_button {
  position: absolute;
  top: 20px;
  right: 20px;
  padding: 10px 20px;
  background-color: #FFB6C1;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  text-decoration: none;
  color: black;
  }
  #hello_message {
  position: absolute;
  top: 20px;
  left: 20px;
  font-size: 24px; /* 調整字體大小 */
}
#confirm, #cancel {
  display: inline-block; /* 讓按鈕並排 */
  margin-right: 10px; /* 添加右邊距以分隔按鈕 */
}
#orderDetailsModal {
  margin-top: 80px; /* 調整方框的上邊距 */
}

  </style>
</head>
<body>
  <div class="container">
    <h1>請輸入訂單資料！ <br> Please insert data to place order!</h1>
    <a href="./cushome.php" id="back_button">回上頁</a>
    <form 
      id="form"
      method="get"
      onsubmit="return false"
      action="./order_check.php"
    >
      <div>
        <p id="odate_input"><b>請選擇取餐日期</b></p>
        <input 
          id="o_date"
          type="date"
          class="input"
          required=""
        >
      </div>
      <div>
        <p id="ostore_input"><b>請選擇要取餐的分店</b></p>
        <select id="o_store" class="input" required>
          <option value="" disabled selected>請選擇分店</option>
          <option value="1">交大店</option>
          <option value="2">新竹店</option>
          <option value="3">台北店</option>
          <option value="4">綠島店</option>
          <option value="5">南投店</option>
        </select>
      </div>
      <div>
        <p id="onum_input"><b>請輸入照燒雞胸餐盒數量(<?php echo $c_price; ?>元/每份)</b></p>
        <input 
          id="c_num"
          type="text"
          class="input"
          placeholder="Order Quantity"
          required=""
        >
      </div>
      <div>
        <p id="onum_input"><b>請輸入薄鹽鯖魚餐盒數量(<?php echo $f_price; ?>元/每份)</b></p>
        <input 
          id="f_num"
          type="text"
          class="input"
          placeholder="Order Quantity"
          required=""
        >
      </div>
      <div>
        <p id="onum_input"><b>請輸入泡菜豬里肌餐盒數量(<?php echo $p_price; ?>元/每份)</b></p>
        <input 
          id="p_num"
          type="text"
          class="input"
          placeholder="Order Quantity"
          required=""
        >
      </div>
      <div>
        <p id="onum_input"><b>請輸入日式壽喜牛餐盒數量(<?php echo $b_price; ?>元/每份)</b></p>
        <input 
          id="b_num"
          type="text"
          class="input"
          placeholder="Order Quantity"
          required=""
        >
      </div>
      <div>
        <input type="checkbox" id="spoon">
        <label for="spoon">需要免洗餐具</label>
      </div>
      <button value="Order" type="submit"><b>下單 Order</b></button>
    </form>
  </div>

  <div class="container">
    <form id="orderDetailsModal" style="display: none;">
      
        <h2>訂單明細 Order Details</h2>
        <p id="modal_date"></p>
        <p id="modal_store"></p>
        <p id="modal_c_num"></p>
        <p id="modal_f_num"></p>
        <p id="modal_p_num"></p>
        <p id="modal_b_num"></p>
        <p id="modal_spoon"></p>
        <p id="modal_total_quantity"></p>
        <p id="modal_total_price"></p>
        <button id="confirm" type="submit">確認 Confirm</button>
        <button id="cancel" type="button" onclick="closeModal(e)">取消 Cancel</button>
      
    </form>
  </div>

</body>
<script>
document.getElementById('form').addEventListener('submit', showOrderDetails);
  
    function showOrderDetails(e) {
      e.preventDefault();
      const date = document.getElementById('o_date').value;
      const store = document.getElementById('o_store').options[document.getElementById('o_store').selectedIndex].text;
      //const store = document.getElementById('o_store').value; // 獲取選擇的分店編號
      //const store_id = parseInt(document.getElementById('o_store').value) || 0;
      const c_num = parseInt(document.getElementById('c_num').value) || 0;
      const f_num = parseInt(document.getElementById('f_num').value) || 0;
      const p_num = parseInt(document.getElementById('p_num').value) || 0;
      const b_num = parseInt(document.getElementById('b_num').value) || 0;
      const spoon = document.getElementById('spoon').checked ? "是" : "否";

      const prices = {
        c_price: "<?php echo $c_price; ?>",
        f_price: "<?php echo $f_price; ?>",
        p_price: "<?php echo $p_price; ?>",
        b_price: "<?php echo $b_price; ?>"
      };
      const totalQuantity = c_num + f_num + p_num + b_num;
      const totalPrice = (c_num * prices.c_price) + (f_num * prices.f_price) + (p_num * prices.p_price) + (b_num * prices.b_price);

      document.getElementById('modal_date').innerText = `取餐日期: ${date}`;
      document.getElementById('modal_store').innerText = `取餐分店: ${store}`;
      document.getElementById('modal_c_num').innerText = `照燒雞胸餐盒數量: ${c_num}`;
      document.getElementById('modal_f_num').innerText = `薄鹽鯖魚餐盒數量: ${f_num}`;
      document.getElementById('modal_p_num').innerText = `泡菜豬里肌餐盒數量: ${p_num}`;
      document.getElementById('modal_b_num').innerText = `日式壽喜牛餐盒數量: ${b_num}`;
      document.getElementById('modal_spoon').innerText = `是否需要免洗餐具: ${spoon}`;
      document.getElementById('modal_total_quantity').innerText = `餐盒總數量: ${totalQuantity}個`;
      document.getElementById('modal_total_price').innerText = `總金額: ${totalPrice} 元`;

      document.getElementById('orderDetailsModal').style.display = 'block';
  }
  document.getElementById('cancel').addEventListener('click', closeModal);
    function closeModal(e) {
      e.preventDefault();
      document.getElementById('orderDetailsModal').style.display = 'none';
    }

    document.getElementById('orderDetailsModal').addEventListener('submit', confirmOrder);
    function confirmOrder(e) {
      e.preventDefault();
      document.getElementById('orderDetailsModal').style.display = 'none';
      var params = {
        ord_date: $('#o_date').val(),
        ord_store: $('#o_store').val(),
        c_num: $('#c_num').val(),
        f_num: $('#f_num').val(),
        p_num: $('#p_num').val(),
        b_num: $('#b_num').val(),
        spoon: $('#spoon').is(':checked') ? 1 : 0
      };
      var query = jQuery.param(params);
      var form = $('#form');
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
                window.location = './getcustomer.php' //到查看訂單
              }
            })
          }
        }
      });
    }
</script>
</html>
