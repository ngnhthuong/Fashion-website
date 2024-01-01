<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
    <div class="ui container grid">
        <div class="row">
            <div class="fifteen wide computer sixteen wide phone centered column center-table">
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="sixteen wide computer sixteen wide phone centered column">
                        <!-- BEGIN DATATABLE -->
                        <div class="ui stacked segment">
                            <div class="ui blue ribbon icon label">Detailed statistics</div>
                            <br><br>
                            <table id="example" class="ui celled table responsive nowrap unstackable"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Invoice Quantity</th>
                                        <th>Product quantity</th>
                                        <th>Profit</th>
                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                    // var_dump($kq); kiểm tra dữ liệu
                                    $i = 1;
                                    while ($i <= 12) {
                                      $total_invoice = count_invoice_month($i);
                                      $total_profit = sum_invoice_month($i);
                                      $slsp = 0;
                                      $invoice_month = getall_invoice_month($i);
                                      // var_dump($invoice_month);
                                      foreach ($invoice_month as $invoice) {
                                        // echo $invoice['id'];
                                        if ($invoice['status'] != 'Cancel' && $invoice['status'] != 'Pending') {
                                          $invoice_cart = getall_cart_month($invoice['id']);
                                          foreach ($invoice_cart as $cart) {
                                            $slsp += $cart['quantity'];
                                          }
                                        }
                                      }
                                      if ($total_invoice > 0) {
                                      } else {
                                        $total_invoice = 0;
                                      }
                                      // <td>' . $total_invoice . '</td>
                                      // <td>' . number_format($total_profit) . '</td>
                                      // <td>' . number_format($slsp) . '</td>
                                      echo '<tr>';
                                      echo '<td>' . $i . '</td>';

                                      if ($total_invoice == 0) {
                                        echo '<td> - </td>';
                                      } else {
                                        echo '<td>' . $total_invoice . '</td>';
                                      }
                                      if ($slsp == 0) {
                                        echo '<td> - </td>';
                                      } else {
                                        echo '<td>' . $slsp . '</td>';
                                      }
                                      if ($total_profit == 0) {
                                        echo '<td> - </td>';
                                      } else {
                                        echo '<td>' . number_format($total_profit) . '</td>';
                                      }
                                      echo '</tr>';
                                      $i++;
                                    }
                                    ?>
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

<!-- <script>
$(document).ready(function() {

  $(document).ready(function() {
    $('#example').DataTable();
  });
  table.buttons().container().appendTo(
    $('div.eight.column:eq(0)', table.table().container())
  );
});
</script> -->

</html>