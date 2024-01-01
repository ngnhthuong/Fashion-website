<?php
session_start();
ob_start();
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
$count_cart = count($_SESSION['cart']);
include "../model_user/connectdb_user.php";
include "../model_user/catalogdb_user.php";
include "../model_user/productdb_user.php";
include "../model_user/clientdb_user.php";
include "../model_user/invoicedb.php";
include "../model_user/strdb_cart.php";
include 'head.php';
$product = getall_product_hot();
$product_use = getall_product_view(0, 0);
$product_view = getall_product_view(0, 1);
$catalog_use = getall_catalog_user();
include 'header.php';
if (isset($_GET['act'])) {
  switch ($_GET['act']) {
    // login page
    case 'login': {
        header('location: login_user.php');
        break;
      }
    case 'login_sc': {
        header('location: login_user.php?success=1');
        break;
      }
    // logout
    case 'logout': {
        if (isset($_SESSION['username'])) {
          unset($_SESSION['username']);
        }
        if (isset($_SESSION['cart'])) {
          // foreach ($_SESSION['cart'] as $key => $item) {
          //   insert_strcart($_SESSION['iduser'], $item[0]);
          // }
          unset($_SESSION['cart']);
        }
        if (isset($_SESSION['iduser'])) {
          unset($_SESSION['iduser']);
        }
        header('location: fashionApp.php?act=home');
        break;
      }
    // login have session user
    case 'login_account_user': {
        if (isset($_POST['user_check']) && ($_POST['user_check'])) {
          $user = $_POST['user'];
          $pass = $_POST['password'];
          $ban = 1;
          $kq_ban = get_userban($user, $ban);
          $kq_user = get_user($user, $pass);

          // var_dump($kq);
          // echo $kq;
          if ($kq_ban == 0) {
            header('location: login_user.php?error=2');
            exit();
          }
          elseif ($kq_user == 0) {
            header('location: login_user.php?error=1');
            exit();
          } else {
            $_SESSION['username'] = $kq_user[0]['user'];
            $_SESSION['iduser'] = $kq_user[0]['id'];
            header('location: fashionApp.php?act=home');
            break;
          }
        }
        break;
      }
    // show more info
    case 'account_user': {
        $client = getall_client_user();
        $order = getall_order();
        include 'account_user.php';
        break;
      }
    // about team
    case 'about': {
        include 'about.php';
        break;
      }
    // show more product catalog
    case 'product_catalog_user': {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
          $iddm = $_GET['id'];
          $catalog_product = getall_product_view($iddm, 0);
        } else {
          $catalog_product = getall_product_view(0, 0);
        }
        include("product_catalog.php");
        break;
      }
    // home of body
    case 'home': {
        include 'body.php';
        break;
      }
    case 'cart': {
        include("cart.php");
        break;
      }
    case 'clear_cart': {
        if (isset($_SESSION['cart'])) {
          unset($_SESSION['cart']);
        }
        include("cart.php");
        break;
      }
    case 'removeProductSingle': {
        if (isset($_GET['id'])) {
          $productIdToDelete = $_GET['id']; // ID của sản phẩm muốn xoá

          foreach ($_SESSION['cart'] as $key => $item) {
            if ($item[0] == $productIdToDelete) {
              unset($_SESSION['cart'][$key]);
              break; // Kết thúc vòng lặp sau khi tìm thấy và xoá sản phẩm
            }
          }
          // (Tùy chọn) Cập nhật lại chỉ mục của mảng
          $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        include("cart.php");
        break;
      }
    case 'detail_product': {
        if (isset($_GET['id']) && ($_GET['id'] != "")) {
          $id = $_GET['id'];
          $detail_product = get_detail_product($id);
          include('detail_product.php');
        } else {
          include("fashionApp.php");
        }
        break;
      }
    case 'checkout': {
        if (!isset($_SESSION['iduser'])) {
          header('Location: fashionApp.php?act=login');
          exit;
        }
        if (isset($_POST['total_prices']) && $_POST['total_prices'] != "") {
          $total_prices = $_POST['total_prices'];
          $id_user = $_SESSION['iduser'];
          $user = get_user_checkout($id_user);
          $lname = $user[0]['lname'];
          $fname = $user[0]['fname'];
          $address = $user[0]['address'];
          $phone = $user[0]['phone'];
          $email = $user[0]['email'];
          $payment = $_POST['payment'];
          $invoice_id = "KINGSMAN" . rand(0, 999999);
          $iddh = create_order($invoice_id, $total_prices, $payment, $lname, $fname, $address, $email, $phone, $id_user);
        }
        // $item = array($id, $name, $img, $price, $quantity, $size);
        if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
          foreach ($_SESSION['cart'] as $item) {
            addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4], $item[5]);
            $product_minus = get_detail_product($item[0]);
            $quantity = $product_minus[0]['quantity'] - $item[4];
            update_quantity_product($item[0], $quantity);
          }
        }
        $more_order = getall_order();
        $more_cart = getall_cart();
        include("checkout.php");
        break;
      }
    case 'check_out_update': {
        if (isset($_POST['address']) && $_POST['address'] != "") {
          $address = $_POST['address'];
          $lname = $_POST['lname'];
          $fname = $_POST['fname'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $notes = $_POST['notes'];
          $iddh = $_POST['iddh'];
          update_checkout($address, $lname, $fname, $phone, $iddh, $email, $notes);
          if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
          }
          // header("location: invoice_print.php?id=".$iddh);
          include("process_payment.php");
        } elseif (isset($_GET['iddh']) && $_GET['iddh'] != "") {
          $iddh = $_GET['iddh'];
          // header("location: invoice_print.php?id=".$iddh);
          include("process_payment.php");
        }
        break;
      }
    case 'add_cart': {
        // Bring information from form
        if (isset($_POST['img']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['id']) && isset($_POST['id'])) {
          $img = $_POST['img'];
          $name = $_POST['name'];
          $price = $_POST['price'];
          $id = $_POST['id'];
          $size = $_POST['size'];
          if (isset($_POST['quantity']) && ($_POST['quantity'] > 0)) {
            $quantity = $_POST['quantity'];
          } else {
            $quantity = 0;
          }
          // Check if the product is already in the cart
          $itemExists = false;
          $tempCart = array();

          foreach ($_SESSION['cart'] as $item) {
            if ($item[0] == $id) {
              // If the product already exists, increase the quantity
              $item[4] += $quantity;
              $itemExists = true;
            }
            $tempCart[] = $item;
          }

          // If the product doesn't exist, add it to the cart
          if (!$itemExists) {
            $item = array($id, $name, $img, $price, $quantity, $size);
            $tempCart[] = $item;
          }

          // Update the cart in the session
          $_SESSION['cart'] = $tempCart;
        }
        include('cart.php');
        // header('location: fashionApp.php');
        break;
      }
    case 'print_invoice': {
        if (isset($_GET['iddh']) && $_GET['iddh'] != "") {
          $iddh = $_GET['iddh'];
          header("location: invoice_print.php?id=" . $iddh);
        }
        break;
      }
    case 'print_invoice_admin': {
        if (isset($_GET['iddh']) && $_GET['iddh'] != "") {
          $iddh = $_GET['iddh'];
          header("location: invoice_print_admin.php?id=" . $iddh);
        }
        break;
      }
    // insert account client user
    case 'insert_client_user': {
        if (isset($_GET['id'])) {
          header('location: register.php');
          break;
        }

        if (isset($_POST['submit']) && $_POST['submit']) {
          if (isset($_POST['user_c'])) {
            $lname = $_POST['last_name_c'];
            $fname = $_POST['first_name_c'];
            $sex = $_POST['sex_c'];
            $email = $_POST['email_c'];
            $phone = $_POST['phone_c'];
            $userr = $_POST["user_c"];
            $password = $_POST['password_c'];
            $address = $_POST['address_c'];

            $check = 0; // flag check null

            if ($lname == "" || $fname == "" || $sex == "" || $email == "" || $phone == "" || $userr == "" || $password == "" || $address == "") {
              $check = 1;
            }

            $account = getall_client_user();

            foreach ($account as $us) {
              if ($us["user"] == $userr) {
                $txt_erro = "User exists, please enter another user!";
                header('location: register.php?act=sameus');
                // echo "<script>alert('User exists, please enter another user!');</script>";
                $check = 2;
                break;
              }
            }

            if ($check == 2) {
              break;
            }

            if ($check == 1) {
              header('location: register.php?act=miss');
              break;
            } else {
              insert_client_user($lname, $fname, $sex, $email, $phone, $userr, $password, $address);
              header('location: fashionApp.php?act=login_sc');
              break;
            }
          }
        }
        break;
      }

    default: {
        include 'body.php';
        break;
      }
  }
} else {
  include 'body.php';
}
include 'footer.php';
?>