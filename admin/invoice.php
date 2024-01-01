<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
    <div class="ui container grid">
        <div class="row">
            <div class="fifteen wide computer sixteen wide phone centered column center-table">
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="sixteen wide computer sixteen wide phone centered column">
                        <!-- BEGIN DATATABLE -->
                        <div class="ui stacked segment">
                            <div class="ui blue ribbon icon label">Invoice Information</div>
                            <br><br>
                            <table id="example" class="ui celled table responsive nowrap unstackable"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>ID</th>
                                        <!-- <th>ID Invoice</th> -->
                                        <th>User_ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <!-- <th>Email</th> -->
                                        <th>Address</th>
                                        <th>Total Prices</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Staff</th>
                                        <th>Order_Day</th>
                                        <th>Function</th>
                                        <!-- <th>E-mail</th> -->
                                    </tr>
                                </thead>
                                <?php
                  // var_dump($dmsp);
                  if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    // var_dump($kq);
                    foreach ($kq as $invoice) {
                      echo '
                        <tr>
                          <td>'.$i.'</td>
                          <td>'.$invoice['id'].'</td>
                          <td>'.$invoice['id_user'].'</td>
                          <td>'.$invoice['fname']. ' ' .$invoice['lname'].'</td>
                          <td>'.$invoice['phone'].'</td>
                          <td>'.$invoice['address'].'</td>
                          <td>'.number_format($invoice['total_prices']).'</td>
                        ';
                        if($invoice['payment'] ==1)
                        {
                          echo '<td>Cash on delivery</td>';
                        } else{
                          echo '<td>Momo</td>';
                        } 

                        if($invoice['status'] =="Pending")
                        {
                          echo '<td class="status-pending">'.$invoice['status'].'</td>';
                        } elseif ($invoice['status'] == "Cancel"){
                          echo '<td class="status-cancel">'.$invoice['status'].'</td>';
                        } elseif ($invoice['status'] == "Delivered"){
                          echo '<td class="status-ordered">'.$invoice['status'].'</td>';
                        };
                        $check_us = 0;
                        foreach($user as $us)
                        {
                          if($us['id']==$invoice['employee_pr'])
                          {
                            echo '<td>'.$us['name_us'].'</td>';
                            $check_us = 1;
                          }
                        }
                        if($check_us == 0)
                        {
                          echo '<td> </td>';
                        }
                        echo '
                          <td>'.$invoice['due_date'].'</td>
                        ';
                        if($invoice['status'] == "Cancel")
                        {
                          echo'
                          <td>
                            <button  class="button-detail"><a class="change-a" href="../web_user/fashionApp.php?act=print_invoice_admin&iddh='.$invoice['id'].'">Details</a></button> 
                          </td>
                        </tr>';
                        } 
                        // elseif($invoice['status'] == "Delivered")
                        // {
                        //   echo'<td>
                        //   <button  class="button-detail"><a class="change-a" href="../web_user/index.php?act=print_invoice_admin&iddh='.$invoice['id'].'">Details</a></button> 
                        //   <button  class="button-print"><a class="change-a" href="../web_user/index.php?act=print_invoice_admin&iddh='.$invoice['id'].'">Print</a></button> 
                        //   </td>
                        // </tr>';
                        // }
                        else {
                          echo'
                          <td>
                            <button  class="button-update"><a class="change-a" href="admin.php?act=updateform_invoice&id='.$invoice['id'].'">Update</a></button>
                            <button  class="button-detail"><a class="change-a" href="../web_user/fashionApp.php?act=print_invoice_admin&iddh='.$invoice['id'].'">Details</a></button> 
                            <button  class="button-print"><a class="change-a" href="../web_user/fashionApp.php?act=print_invoice_admin&iddh='.$invoice['id'].'">Print</a></button> 
                          </td>
                        </tr>';
                        }
                      $i++;
                    }
                  }
                ?>
                            </table>
                            <div>
                                <!-- <button  class="button-insert"><a class="change-a" href="admin.php?act=insert_client&id='1'">Insert</a></button> -->
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