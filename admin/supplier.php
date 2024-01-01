<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Supplier Information</div>
              <br><br>
              <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                <thead>
                  <tr>
                    <th>Number</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Bank Account</th>
                    <th>Tax Code</th>
                    <th>Function
                    </th>
                  </tr>
                </thead>
                <?php
                // var_dump($kq); kiểm tra dữ liệu
                if(isset($kq)&&(count($kq)>0)){
                  $i=1;
                  foreach ($kq as $supplier) {
                    echo '
                      <tr>
                         <td>'.$i.'</td>
                        <td>'.$supplier['sup_id'].'</td>
                         <td>'.$supplier['sup_name'].'</td>
                         <td>'.$supplier['sup_address'].'</td>
                         <td>'.$supplier['sup_bank'].'</td>
                         <td>'.$supplier['sup_tax_code'].'</td>
                         <td>
                         <div class="frame1">
                         <button class="button-update"><a class="change-a" href="admin.php?act=updateform_supplier&id='.$supplier['sup_id'].'">Update</a></button>
                         <button class="button-delete"><a class="change-a" href="admin.php?act=del_supplier&id='.$supplier['sup_id'].'">Delete</a></button> 
                         </div>
                          </td>
                      </tr>
                        ';
                      $i++;
                  }
                }
                ?>
              </table>
              <div>
              <button class="button-insert" ><a class="change-a" href="admin.php?act=insert_supplier&id='1'">Insert</a></button>
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