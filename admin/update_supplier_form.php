<script>
function validateForm() {
  var name = document.getElementsByName("supplier_name")[0].value;
  var bank = document.getElementsByName("supplier_bank")[0].value;
  var address = document.getElementsByName("supplier_address")[0].value;
  var tax_code = document.getElementsByName("supplier_tax")[0].value;

  if (name == "") {
    alert("Please fill out supplier name!");
    return false;
  }
  if (bank == "") {
    alert("Please fill out bank account!");
    return false;
  }
  if (address == "") {
    alert("Please fill out address!");
    return false;
  }
  if (tax_code == "") {
    alert("Please fill out tax code!!");
    return false;
  }
  return true;
}
</script>



<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Update Supplier Information</div>
              <br><br>
              <?php
              // echo var_dump($result);
              ?>
              <form action="admin.php?act=updateform_supplier" method="POST" onsubmit="return validateForm()">
                <label>Name</label>
                <input type="text" name="supplier_name" id="" value="<?=$result[0]['sup_name']?>">
                <label>Address</label>
                <input type="text" name="supplier_address" id="" value="<?=$result[0]['sup_address']?>">
                <label>Bank Account</label>
                <input type="text" name="supplier_bank" id="" value="<?=$result[0]['sup_bank']?>">
                <label>Tax Code</label>
                <input type="text" name="supplier_tax" id="" value="<?=$result[0]['sup_tax_code']?>">
                <input type="hidden" name="id" value="<?=$result[0]['sup_id']?>">
                <input type="submit" name="supplier_update" value="Update">
              </form>
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