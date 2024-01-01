<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Product Information</div>
              <br><br>
              <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                <thead>
                  <tr>
                    <th>Number</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Size</th>
                    <!-- <th>Old Prices/Unit</th> -->
                    <th>Price/Unit</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Catalog</th>
                    <th>Employee Entry</th>
                    <th>Date Entry</th>
                    <th>Supplier</th>
                    <th>Function</th>
                    <!-- <th>E-mail</th> -->
                  </tr>
                </thead>
                <?php
                  // var_dump($dmsup);
                  if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    foreach ($kq as $product) {
                      $name = ''; // Khởi tạo biến $name trước vòng lặp
                      foreach ($dmsp as $dm) {
                        if ($dm['id_catalog_k'] == $product['catalog_id']) {
                          $name = $dm['catalog_name'];
                          break;
                        }
                      }
                      $name_employee='';
                      foreach ($dmee as $us) {
                        if ($us['id'] == $product['employee_entry']) {
                          $name_employee = $us['name_us'];
                          break;
                        }
                      }
                      $name_supplier='';
                      foreach ($dmsup as $sup) {
                        if ($sup['sup_id'] == $product['sup_id']) {
                          $name_supplier = $sup['sup_name'];
                          break;
                        }
                      }
                      echo '
                        <tr>
                          <td>'.$i.'</td>
                          <td>'.$product['id_product'].'</td>
                          <td>'.$product['product_name'].'</td>
                          <td>'.$product['size'].'</td>
                          <td>'.number_format($product['product_prices']).'</td>
                          <td>'.$product['quantity'].'</td>
                          <td><img src="../uploads/'.$product['product_img'].'" width="80px"></td>
                          <td>'.$name.'</td>
                          <td>'.$name_employee.'</td>
                          <td>'.$product['entry_date'].'</td>
                          <td>'.$name_supplier.'</td>
                          <td>
                            <button  class="button-update"><a class="change-a" href="admin.php?act=updateform_product&id='.$product['id_product'].'">Update</a></button>
                            <button  class="button-delete"><a class="change-a" href="admin.php?act=del_product&id='.$product['id_product'].'">Delete</a></button> 
                          </td>
                        </tr>';
                      $i++;
                    }
                  }
                ?>

              </table>
              <div>
                  <button  class="button-insert"><a class="change-a" href="admin.php?act=insert_product&id='1'">Insert</a></button>
              </div>
            </div>
            <!-- END DATATABLE -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->
</div>
</body>
<!-- inject:js -->
<script src=" vendors/jquery/jquery.min.js">
</script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->
<!-- datatables:js -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net/datatables.net-se/js/dataTables.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive-se/js/responsive.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons-se/js/buttons.semanticui.min.js"></script>
<script src="vendors/jszip/jszip.min.js"></script>
<script src="vendors/pdfmake/pdfmake.min.js"></script>
<script src="vendors/pdfmake/vfs_fonts.js"></script>
<!-- endinject -->

<script>
$(document).ready(function() {

  $(document).ready(function() {
    $('#example').DataTable();
  });
  table.buttons().container().appendTo(
    $('div.eight.column:eq(0)', table.table().container())
  );
});
</script>

</html>