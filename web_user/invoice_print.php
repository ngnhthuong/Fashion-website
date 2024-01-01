<?php
  include "../model_user/connectdb_user.php";
  include "../model_user/invoicedb.php";
  $id = $_GET['id'];
  $kq_order = getall_order_id($id);
  $kq_cart = getall_cart_id($id);
?>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
    color-adjust: exact;
  }

  body {
    height: 100vh;
    display: grid;
    place-items: center;
  }

  .invoice {
    height: min(700px, 100vw);
    width: min(1200px, 100vw);
    font: 100 0.7rem 'myriad pro', helvetica, sans-serif;
    border: 0.5px solid grey;
    padding: 2rem 2rem;
    display: flex;
    flex-direction: column;
    gap: 3rem;
  }

  .invoice-wrapper {
    display: flex;
    justify-content: space-between;
    padding: 0 1rem;
  }

  .invoice-company {
    text-align: right;
  }

  .invoice-company-name {
    font-size: 0.9rem;
    margin-bottom: 1.25rem;
  }

  .invoice-company-address {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
  }

  .invoice-logo {
    height: 5rem;
  }

  .invoice-billing-company {
    font-size: 0.65rem;
    margin-bottom: 0.25rem;
  }

  .invoice-billing-address {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
  }

  .invoice-info {
    display: flex;
    justify-content: space-between;
    gap: 2rem;
    margin: 0.25rem 0;
  }

  .invoice-info:nth-of-type(5) {
    margin-top: 1.5rem;
  }

  .invoice-info-value {
    font-weight: 900;
  }

  .invoice-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.8rem;
  }

  .invoice-table th,
  .invoice-table td {
    border: 1px solid #ddd;
    padding: 0.5rem;
    text-align: center;
  }

  .invoice-table th {
    background-color: #f5f5f5;
    font-weight: bold;
  }

  .invoice-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .invoice-table tr:hover {
    background-color: #f1f1f1;
  }

  .invoice-total {
    font-weight: 900;
  }

  .invoice-print {
    font-size: 1.25rem;
    margin: 0 auto;
    cursor: pointer;
    border: 1.25px solid black;
    border-radius: 10%;
    padding: 0.6rem;
  }

  .invoice-print:active {
    background-color: green;
    color: white;
  }

  .custom-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  .custom-button:hover {
    background-color: #45a049;
  }

  a {
    color: #000;
    text-decoration: none;
    transition: color 0.3s;
    color: white;
  }

  @media print {
    .custom-button {
      display: none;
    }
  }

  .button-wrapper {
    display: flex;
  }

  .button-wrapper ion-icon,
  .button-wrapper button {
    margin-right: 10px;
  }
</style>




<main class='invoice'>
  <div class='invoice-wrapper'>
    <img
      src='../assets/images/logo/logo5.png'
      alt='logo' class='invoice-logo'>
    <div class='invoice-company'>
      <h2 class='invoice-company-name'>KINGSMAN</h2>
      <p class='invoice-company-address'>
        <span>Hang Thuyen Street,</span>
        <span>Neighborhood 6 P, Thu Duc City - HCM, VietNam</span>
        <span>group5@gm.uit.edu.vn</span>
      </p>
    </div>
  </div>
  <div class='invoice-wrapper'>
    <div class='invoice-billing'>
    <h2 class="invoice-info-value" style="font-size: 10px;">DELIVERY DETAILS</h2>
      <?php
        echo '
            <h2 class="invoice-billing-company">'.$kq_order[0]['fname'].' '.$kq_order[0]['lname'].'</h2>
            <p class="invoice-billing-address">
            
                <span>Phone: '.$kq_order[0]['phone'].'</span>
                <span>Email: '.$kq_order[0]['email'].'</span>
                <span>Address: '.$kq_order[0]['address'].'</span>
                <br>
                <span>Notes: '.$kq_order[0]['notes'].'</span>
            </p>
        ';


        echo '
        </div>
        <div class="invoice-details">
            <div class="invoice-info">
                <span class="invoice-info-key">Invoice No:</span>
                <span class="invoice-info-value">'.$kq_order[0]['invoice_id'].'</span>
            </div>
            <div class="invoice-info">
                <span class="invoice-info-key">Client Number:</span>
                <span class="invoice-info-value">'.$kq_order[0]['id_user'].'</span>
            </div>
            <div class="invoice-info">
                <span class="invoice-info-key">Due Date:</span>
                <span class="invoice-info-value">'.$kq_order[0]['due_date'].'</span>
            </div>
            <div class="invoice-info">
                <span class="invoice-info-key">Status:</span>
                <span class="invoice-info-value">'.$kq_order[0]['status'].'</span>
            </div>
        </div>    
    ';
      ?>





  </div>
  <table class='invoice-table'>
    <tr>
      <th>Name Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Amount</th>
    </tr>
    <?php
        $total = 0;
        foreach($kq_cart as $cart)
        {
        echo'    
        <tr>
          <td>'.$cart["name_pro"].'</td>
          <td>'.$cart["quantity"].'</td>
          <td>'.number_format($cart["prices"]).'</td>
          <td>'.number_format($cart["prices"]*$cart["quantity"]).'</td>
        </tr>';
        $total = $total + ($cart["prices"]*$cart["quantity"]);
        }
        $tax = $total * 0.1;
      ?>
  </table>
      <div>
        <div style="float: right; width: 17%;">
          <?php
            if (isset($tax)) {
              echo '<h3 style="color: purple;" >Tax:  ' .number_format($tax). '</h3>';
              } else {
              echo '<td>0</td>';
            } 
            echo '<br><br>';

            if(isset($kq_order)&&(count($kq_order)>0))
            {
              echo '<h3 style="color: red;">Total Prices:  '.number_format($kq_order[0]["total_prices"]). '</h3>';
            }
          ?>
        </div>
      </div>
  <div class="button-wrapper">
    <ion-icon name="print-outline" class="invoice-print"></ion-icon>
    <button class="custom-button"><a href="fashionApp.php" class="axil-btn btn-bg-primary checkout-btn">Home Page</a></button>
</div>
</main>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script>
  const print = document.querySelector('.invoice-print');
  const media = window.matchMedia('print');

  const update = (e) => print.style.display = e.matches ? 'none' : 'block';

  function convert() {
    media.addEventListener('change', update, false);
    window.print();
  }

  print.addEventListener('click', convert, false);
</script>