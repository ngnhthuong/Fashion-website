<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Insert Data</div>
              <br><br>
              <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                <thead>
                  <tr>
                    <th>Insert Client</th>
                    <th>Insert Supplier</th>
                    <th>Insert Invoice</th>
                    <th>Insert Product</th>
                    <th>Insert Catalog</th>
                  </tr>
                </thead>
                <td>
                  <button class="button-update"><a class="change-a" href="admin.php?act=insert_client&id='1'">Insert client</a></button>
                </td>
                <td>
                  <button class="button-update"><a class="change-a" href="admin.php?act=insert_supplier&id='1'">Insert supplier</a></button>
                </td>
                <td>
                  <button class="button-update"><a class="change-a" href="admin.php?act=insert_invoice&id='1'">Insert invoice</a></button>
                </td>
                <td>
                  <button class="button-update"><a class="change-a" href="admin.php?act=insert_product&id='1'">Insert product</a></button>
                </td>
                <td>
                  <button class="button-update"><a class="change-a" href="admin.php?act=insert_catalog&id='1'">Insert catalog</a></button>
                </td>
              </table>
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



</html>