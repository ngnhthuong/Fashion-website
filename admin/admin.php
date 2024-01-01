<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
  include("../model/connectdb.php");
  include("../model/productdb.php");
  include("../model/catalogdb.php");
  include("../model/userdb.php");
  include("../model/clientdb.php");
  include("../model/supplierdb.php");
  include("../model/invoicedb.php");
  include("../model/statisticdb.php");
  include("head.php");
  // connectdb();
  include("header.php");
  include("sidebar.php");
  if (isset($_GET['act'])) {
    switch ($_GET['act']) {
      case 'logout': {
          if (isset($_SESSION['role'])) {
            unset($_SESSION['role']);
          }
          if (isset($_SESSION['name'])) {
            unset($_SESSION['name']);
          }
          header('location: login.php');
          break;
        }
        //client
        //call client
      case 'client': {
          $kq = getall_client();
          include("client.php");
          break;
        }
      case 'statistic': {
          include("statistic.php");
          break;
        }
        //insert client
      case 'insert_client': {
          if (isset($_GET['id'])) {
            include("insert_client.php");
          }
          if (isset($_POST['submit']) && $_POST['submit']) {
            if (isset($_POST['user_c'])) {
              // information insert
              $lname = $_POST['last_name_c'];
              $fname = $_POST['first_name_c'];
              $sex = $_POST['sex_c'];
              $address = $_POST['address_c'];
              $email = $_POST['email_c'];
              $phone = $_POST['phone_c'];
              $user = $_POST["user_c"];
              $password = $_POST['password_c'];
              //flag check null

              // echo var_dump($_POST);

              $check = false;
              if ($lname == "" || $fname == "" || $sex == "" || $email == "" || $phone == "" || $user == "" || $password == "" || $address == "") {
                $check = true;
              }
              if ($check) {
                $kq = getall_client();
                include("client.php");
                echo '<script type="text/javascript">';
                echo "alert('Can not create User because you input missing information!');";
                echo '</script>';
                break;
              } else {
                insert_client($lname, $fname, $sex, $email, $phone, $user, $password, $address);
                $kq = getall_client();
                include("client.php");
                echo '<script type="text/javascript">';
                echo "alert('Insert Client sucessed!');";
                echo '</script>';
                break;
              }
            }
          }
          break;
        }
        // Update client
      case 'updateform_client': {
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = getoneClient($id);
            include("update_client_form.php");
          }
          if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $lname = $_POST['last_name_c'];
            $fname = $_POST['first_name_c'];
            $sex = $_POST['sex_c'];
            $address = $_POST['address_c'];
            $email = $_POST['email_c'];
            $phone = $_POST['phone_c'];
            $user = $_POST["user_c"];
            $ban = $_POST["ban_c"];
            $password = $_POST['password_c'];
            update_client($id, $lname, $fname, $sex, $email, $phone, $user, $password, $address, $ban);
            $kq = getall_client();
            include("client.php");
            echo '<script type="text/javascript">';
            echo "alert('Update Client Successed!');";
            echo '</script>';
            break;
          }
          break;
        }
        //supplier
      case 'supplier': {
          $kq = getall_supplier();
          include("supplier.php");
          break;
        }
        //supplier update
      case 'updateform_supplier': {
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = getoneSupplier($id);
            $kq = getall_supplier();
            include("update_supplier_form.php");
          }
          if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $name = $_POST['supplier_name'];
            $address = $_POST['supplier_address'];
            $bank = $_POST['supplier_bank'];
            $tax = $_POST['supplier_tax'];
            $check = false;
            $sup_cur = getall_supplier();
            foreach ($sup_cur as $sup) {
              if (strtolower($name) == strtolower($sup['sup_name']) && $id != $sup['sup_id']) {
                $check = true;
              }
            }
            if ($check == true) {
              $kq = getall_supplier();
              include("supplier.php");
              echo '<script type="text/javascript">';
              echo "alert('Update supplier failure because supplier exist!');";
              echo '</script>';
              break;
            } elseif ($check == false) {
              update_supplier($id, $name, $address, $bank, $tax);
              $kq = getall_supplier();
              include("supplier.php");
              echo '<script type="text/javascript">';
              echo "alert('Update Supplier Successed!');";
              echo '</script>';
              break;
            }
          }
          break;
        }
        //supplier delete
      case 'del_supplier': {
          if (isset($_GET['id'])) {
            $kq = getall_product();
            $id = $_GET['id'];
            $check = false;
            foreach ($kq as $dm) {
              if ($dm['sup_id'] == $id) {
                $check = true;
              }
            }
            if ($check) {
              $kq = getall_supplier();
              include("supplier.php");
              echo '<script type="text/javascript">';
              echo "alert('Do not delete supplier because do not run out product');";
              echo '</script>';
              break;
            } else {
              echo '<script>
                        if (confirm("Do you want to delete supplier?")) {
                            window.location.href = "admin.php?act=delete_supplier_sc&id=' . $id . '";
                        } else {
                            window.location.href = "admin.php?act=delete_supplier_fl";
                        }
                        </script>';
            }
          } else {
            $kq = getall_supplier();
            include("supplier.php");
            echo '<script>
                          alert("Delete Supplier failure!");
                      </script>';
          }
          break;
        }
      case 'delete_supplier_fl': {
          $kq = getall_supplier();
          include("supplier.php");
          echo '<script>
                          alert("Cancelled!");
                      </script>';
          break;
        }
      case 'delete_supplier_sc': {
          if (isset($_GET['id']) && ($_GET['id'] != "")) {
            $id = $_GET['id'];
            delete_supplier($id);
            $kq = getall_supplier();
            include("supplier.php");
            echo '<script>
                            alert("Delete supplier sucessed!");
                        </script>';
          } else {
            $kq = getall_supplier();
            include("supplier.php");
            echo '<script>
                            alert("Delete supplier failure!");
                        </script>';
          }
          break;
        }
        //insert supplier
      case 'insert_supplier': {
          if (isset($_GET['id'])) {
            include("insert_supplier.php");
          }
          if (isset($_POST['submit']) && $_POST['submit']) {
            // var_dump($_POST);
            if (isset($_POST['supplier_name']) && $_POST['supplier_name'] != NULL) {
              $name = $_POST['supplier_name'];
              $address = $_POST['supplier_address'];
              $bank = $_POST['supplier_bank'];
              $tax = $_POST['supplier_tax'];
              $check = false;
              if ($name == "" || $address == "" || $bank == "" || $tax == "") {
                $check = true;
              }
              $sup_cur = getall_supplier();
              foreach ($sup_cur as  $sup) {
                if (strtolower($sup['sup_name']) == strtolower($name)) {
                  $check = true;
                }
              }
              if ($check) {
                $kq = getall_supplier();
                include("supplier.php");
                echo '<script type="text/javascript">';
                echo "alert('Do not insert supplier because you missing product or supplier exist');";
                echo '</script>';
                break;
              } else {
                insert_supplier($name, $address, $bank, $tax);
                $kq = getall_supplier();
                include("supplier.php");
                echo '<script type="text/javascript">';
                echo "alert('Insert supplier sucessed!');";
                echo '</script>';
                break;
              }
            } else if ($_POST['supplier_name'] == "") {

              $kq = getall_supplier();
              include("supplier.php");
              echo '<script type="text/javascript">';
              echo "alert('Do not insert supplier because you missing product');";
              echo '</script>';
              break;
            } else {
              $kq = getall_supplier();
              include("supplier.php");
              echo '<script type="text/javascript">';
              echo "alert('Insert Supplier Successed!');";
              echo '</script>';
            }
          }
          break;
        }
        // invoice
      case 'invoice': {
          $user = getall_user();
          $kq = getall_invoice();
          include("invoice.php");
          break;
        }

        //insert data all
      case 'insert_data': {
          include("insert_data.php");
          break;
        }
        // Catalog begin
        // call catalog
      case 'catalog': {
          $kq = getall_catalog();
          include("catalog.php");
          break;
        }
        // insert catalog
      case 'insert_catalog': {
          if (isset($_GET['id'])) {
            include("insert_catalog.php");
          }
          if (isset($_POST['submit']) && $_POST['submit']) {
            // var_dump($_POST);
            if (isset($_POST['name_catalog']) && $_POST['name_catalog'] != NULL) {
              $rawName = $_POST['name_catalog'];
              $name = trim($rawName);
              $prioritize = $_POST['prioritize_catalog'];
              $display = $_POST['display_catalog'];
              $check = false;
              if ($name == "" || $prioritize == "" || $display == "") {
                $check = true;
              }
              $cata_cur = getall_catalog();
              foreach ($cata_cur as $cata) {
                if (strtolower($cata['catalog_name']) == strtolower($name)) {
                  $check = true;
                }
              }
              if ($check == true) {
                $kq = getall_catalog();
                include("catalog.php");
                echo '<script type="text/javascript">';
                echo "alert('Do not insert catalog because your are missing information or catalog exist');";
                echo '</script>';
              } else {
                insert_catalog($name, $prioritize, $display);
                $kq = getall_catalog();
                include("catalog.php");
                echo '<script type="text/javascript">';
                echo "alert('Insert Catalog Successed!');";
                echo '</script>';
                break;
              }
            } else if ($_POST['name_catalog'] == "") {
              $kq = getall_catalog();
              include("catalog.php");
              echo '<script type="text/javascript">';
              echo "alert('Do not insert catalog because your are missing information');";
              echo '</script>';
              break;
            }
          }
          break;
        }
        // delete catalog
      case 'del_catalog': {
          if (isset($_GET['id'])) {
            $kq = getall_product();
            $id = $_GET['id'];
            $check = false;
            foreach ($kq as $dm) {
              if ($dm['catalog_id'] == $id) {
                $check = true;
              }
            }
            if ($check) {
              $kq = getall_catalog();
              include("catalog.php");
              echo '<script>
                  alert("Do not delete catalog because do not run out product!");
                  </script>';
            } else {
              echo '<script>
                  if (confirm("Do you want to delete catalog?")) {
                      window.location.href = "admin.php?act=delete_catalog_sc&id=' . $id . '";
                  } else {
                      window.location.href = "admin.php?act=delete_catalog_fl";
                  }
                  </script>';
            }
          } else {
            $kq = getall_catalog();
            include("catalog.php");
            echo '<script>
                    alert("Delete Catalog Failure!");
                </script>';
          }
          break;
        }
      case 'delete_catalog_fl': {
          $kq = getall_catalog();
          include("catalog.php");
          echo '<script>
                    alert("Cancelled!");
                </script>';
          break;
        }
      case 'delete_catalog_sc': {
          if (isset($_GET['id']) && ($_GET['id'] != "")) {
            $id = $_GET['id'];
            delete_catalog($id);
            $kq = getall_catalog();
            include("catalog.php");
            echo '<script>
                    alert("Delete Catalog Sucessed!");
                </script>';
          } else {
            $kq = getall_catalog();
            include("catalog.php");
            echo '<script>
                    alert("Delete Catalog Failure!");
                </script>';
          }
          break;
        }
        //end delete_catalog
        // update catalog
      case 'updateform_catalog': {
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = getoneCatalog($id);
            $kq = getall_catalog();
            include("update_catalog_form.php");
          }
          if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $rawName = $_POST['catalog_name'];
            $name = trim($rawName);
            $display = $_POST['display_ctl'];
            $check = false;
            $cata_cur = getall_catalog();
            foreach ($cata_cur as $cata) {
              if ((strtolower($name) == strtolower($cata['catalog_name'])) && ($cata['display_ctl'] == $display)) {
                $check = true;
              }
            }
            if ($check == true) {
              $kq = getall_catalog();
              include("catalog.php");
              echo '<script>
                  alert("Update catalog failure because exist catalog!");
                  </script>';
              break;
            } elseif ($check == false) {
              update_catalog($id, $name, $display);
              $kq = getall_catalog();
              include("catalog.php");
              echo '<script>
                  alert("Update Catalog Successed!");
                  </script>';
              break;
            }
          }
          break;
        }
        // catalog end
        // product begin
      case 'product': {
          $dmsp = getall_catalog();
          $dmee = getall_user();
          $dmsup = getall_supplier();
          $kq = getall_product();
          include("product.php");
          break;
        }
      case 'insert_product': {
          if (isset($_GET['id'])) {
            $dmsp = getall_catalog();
            $dmee = getall_user();
            $dmsup = getall_supplier();
            include("insert_product.php");
          }

          if (isset($_POST['submit'])) {
            // Lấy thông tin sản phẩm từ biểu mẫu
            $id_pd = $_POST['iddm'];
            $id_ee = $_POST['idee'];
            $name_pd = $_POST['name_product'];
            $quantity_pd = $_POST['quantity_product'];
            $prices_pd = $_POST['prices_product'];
            $oldprices_pd = $_POST['old_prices_product'];
            $view_pd = $_POST['view_product'];
            $special_pd = $_POST['Special_product'];
            $sup_pd = $_POST['idsup'];
            $size_pd = strtoupper($_POST['size_product']);
            $description_pd = $_POST['Description_product'];
            //upload picture
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["img_product"]["name"]);
            $img_pd = basename($_FILES["img_product"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
              $uploadOk = 0;
            }
            $checkExistQuantity = false;
            if ($uploadOk == 1) {
              move_uploaded_file($_FILES["img_product"]["tmp_name"], $target_file);
              // Kiểm tra xem sản phẩm đã tồn tại trong cơ sở dữ liệu hay chưa
              $existing_product = get_product_by_name_and_size($name_pd, $size_pd);
              if ($existing_product) {
                // Cập nhật số lượng sản phẩm
                $new_quantity = $existing_product['quantity'] + $quantity_pd;
                update_product_quantity($existing_product['id_product'], $new_quantity);
                $checkExistQuantity = true;
              } else {
                if ($id_pd == 0) {
                  $dmsp = getall_catalog();
                  $dmee = getall_user();
                  $dmsup = getall_supplier();
                  $kq = getall_product();
                  include("product.php");
                  echo '<script>
                                alert("Insert product failure because missing information!!");
                                </script>';
                } else if ($sup_pd == 0) {
                  $dmsp = getall_catalog();
                  $dmee = getall_user();
                  $dmsup = getall_supplier();
                  $kq = getall_product();
                  include("product.php");
                  echo '<script>
                                alert("Insert product failure because missing information!!");
                                </script>';
                } else {
                  insert_product($id_pd, $quantity_pd, $name_pd, $prices_pd, $img_pd, $id_ee, $sup_pd, $oldprices_pd, $view_pd, $special_pd, $description_pd, $size_pd);
                  $dmsp = getall_catalog();
                  $dmee = getall_user();
                  $dmsup = getall_supplier();
                  $kq = getall_product();
                  include("product.php");
                  if ($checkExistQuantity) {
                    echo '<script>
                                  alert("Existed, the quantity is updated!");
                                  </script>';
                    $checkExistQuantity = false;
                  } else {
                    echo '<script>
                                  alert("Insert Product Succeeded!");
                                  </script>';
                  }
                }
                // Thêm sản phẩm mới vào cơ sở dữ liệu
              }
            } else {
              $dmsp = getall_catalog();
              $dmee = getall_user();
              $dmsup = getall_supplier();
              $kq = getall_product();
              include("product.php");
              echo '<script>
                          alert("Insert product failure because missing information!");
                          </script>';
            }
          }
          break;
        }

      case 'del_product': {
          if (isset($_GET['id'])) {
            $cart = getall_cart_id();
            $flag = false;
            foreach ($cart as $c) {
              if ($_GET['id'] == $c['id_pro']) {
                $flag = true;
              }
            }
            if ($flag == false) {
              $id = $_GET['id'];
              echo '<script>
                    if (confirm("Do you want to delete product?")) {
                        window.location.href = "admin.php?act=delete_product_sc&id=' . $id . '";
                    } else {
                        window.location.href = "admin.php?act=delete_product_fl";
                    }
                    </script>';
            } else {
              $dmsp = getall_catalog();
              $dmee = getall_user();
              $dmsup = getall_supplier();
              $kq = getall_product();
              include("product.php");
              echo '<script>
                    alert("Delete product failure because product is being stored in the order!");
                    </script>';
            }
          } else {
            $dmsp = getall_catalog();
            $dmee = getall_user();
            $dmsup = getall_supplier();
            $kq = getall_product();
            include("product.php");
            echo '<script>
                  alert("Delete product failure because id does not exist!");
                  </script>';
          }
          break;
        }
      case 'delete_product_fl': {
          $dmsp = getall_catalog();
          $dmee = getall_user();
          $dmsup = getall_supplier();
          $kq = getall_product();
          include("product.php");
          echo '<script>
                        alert("Cancelled!");
                    </script>';
          break;
        }
      case 'delete_product_sc': {
          if (isset($_GET['id']) && ($_GET['id'] != "")) {
              $id = $_GET['id'];
              delete_product($id);
              $dmsp = getall_catalog();
              $dmee = getall_user();
              $dmsup = getall_supplier();
              $kq = getall_product();
              include("product.php");
              echo '<script> alert("Delete product Sucessed!");</script>';
          } else {
            $dmsp = getall_catalog();
            $dmee = getall_user();
            $dmsup = getall_supplier();
            $kq = getall_product();
            include("product.php");
            echo '<script>
                            alert("Delete product Failure!");
                        </script>';
          }
          break;
        }

      case 'updateform_product': {
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = getoneProduct($id);
            $kq = getall_product();
            $dmee = getall_user();
            $dmsp = getall_catalog();
            $dmsup = getall_supplier();
            include("update_product_form.php");
          }
          if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $id_pd = $_POST['iddm'];
            $id_ee = $_POST['idee'];
            $id_sup = $_POST['idsup'];
            $pdName = $_POST['name_product'];
            $name_pd = trim($pdName);
            $quantity_pd = $_POST['quantity_product'];
            $prices_pd = $_POST['prices_product'];
            $oldprices_pd = $_POST['oldprices_product'];
            $view_pd = $_POST['view_product'];
            $special_pd = $_POST['special_product'];
            $description_pd = $_POST['description_product'];
            $size_pd = strtoupper($_POST['size_product']);
            //upload picture
            if ($_FILES["img_product"]["name"] != "") {
              $target_dir = "../uploads/";
              $target_file = $target_dir . basename($_FILES["img_product"]["name"]);
              $img_pd = basename($_FILES["img_product"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
              // Allow certain file formats
              if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
              ) {
                $uploadOk = 0;
              }
              move_uploaded_file($_FILES["img_product"]["tmp_name"], $target_file);
              if ($uploadOk == 1) {
                move_uploaded_file($_FILES["img_product"]["tmp_name"], $target_file);
              }
            } else {
              $img_pd = "";
            }
            $getproduct = getall_product();
            $flag_check_similar = false;
            foreach ($getproduct as $pro) {
              if ($pro['product_name'] == $name_pd && $id != $pro['id_product']) {
                $flag_check_similar = true;
              }
            }
            if ($flag_check_similar) {
              $kq = getall_product();
              $dmee = getall_user();
              $dmsp = getall_catalog();
              $dmsup = getall_supplier();
              $flag_check_similar = false;
              include("product.php");
              echo '<script>
                      alert("Update product failure because product exist!");
                      </script>';
            } else {
              update_product($id, $quantity_pd, $id_pd, $name_pd, $prices_pd, $img_pd, $id_ee, $id_sup, $oldprices_pd, $view_pd, $special_pd, $description_pd, $size_pd);
              $dmsp = getall_catalog();
              $dmee = getall_user();
              $dmsup = getall_supplier();
              $kq = getall_product();
              include("product.php");
              echo '<script>
                        alert("Update product Sucessed!");
                        </script>';
            }
          }
          break;
        }
      case 'updateform_invoice': {
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dmee = getall_user();
            $result = getoneInvoice($id);
            include("update_invoice_form.php");
          }
          if (!isset($_GET['id'])) {
            if (isset($_POST['id']) && ($_POST['idee'] != 0)) {
              $id = $_POST['id'];
              $id_ee = $_POST['idee'];
              $phone = $_POST['phone'];
              $email = $_POST['email'];
              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $address = $_POST['address'];
              $status = $_POST['status'];
              update_invoice($id, $id_ee, $status, $phone, $email, $fname, $lname, $address);
              $kq = getall_invoice();
              $user = getall_user();
              if ($status == "Cancel") {
                $id_cart = getall_cart_month($id);
                foreach ($id_cart as $cart) {
                  $quantity = $cart['quantity'];
                  $id_pro = $cart['id_pro'];
                  $product = getoneProduct($id_pro);
                  $quantity = $quantity + $product[0]['quantity'];
                  update_product_quantity($id_pro, $quantity);
                }
              }
              include("invoice.php");
              echo '<script type="text/javascript">';
              echo "alert('Update invoice Successed!');";
              echo '</script>';
            } else {
              $user = getall_user();
              $kq = getall_invoice();
              include("invoice.php");
              echo '<script type="text/javascript">';
              echo "alert('Update failure please enter employee process!');";
              echo '</script>';
            }
          }
          break;
        }
        // product end
      default: {
          header('location: login.php');
          break;
        }
    }
  }
} else {
  header('location: login.php');
}
