<script>
function validateForm() {
    var idee = document.getElementById("idee").value;
    var email = document.getElementsByName("email")[0].value;
    var fname = document.getElementsByName("fname")[0].value;
    var lname = document.getElementsByName("lname")[0].value;
    var address = document.getElementsByName("address")[0].value;

    if (idee == 0) {
        alert("Please choose employee entry!");
        return false;
    }

    if (email == "") {
        alert("Please fill out client email!");
        return false;
    }

    // Check if the email has a valid format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address!");
        return false;
    }

    if (fname == "") {
        alert("Please fill out client first name!");
        return false;
    }

    if (lname == "") {
        alert("Please fill out client last name!");
        return false;
    }

    if (address == "") {
        alert("Please fill out client address!");
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
                            <div class="ui blue ribbon icon label">Update Invoice Information</div>
                            <br><br>
                            <?php
              // echo var_dump($result);
              ?>
                            <label>Invoice Code<span style="color: red"> *</span></label>
                            <input class="banban" type="text" name="id_invoice" value="<?=$result[0]['invoice_id']?>"
                                placeholder="Name of Product" readonly>
                            <form action="admin.php?act=updateform_invoice" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                <label>First Name <span style="color: red"> *</span></label>
                                <input type="text" name="fname" value="<?=$result[0]['fname']?>"
                                    placeholder="First name"></input>
                                <label>Last Name <span style="color: red"> *</span></label>
                                <input type="text" name="lname" value="<?=$result[0]['lname']?>"
                                    placeholder="Last name"></input>
                                <label>Phone <span style="color: red"> *</span></label>
                                <input type="text" name="phone" value="<?=$result[0]['phone']?>"
                                    placeholder="Phone of client"></input>
                                <label>Email <span style="color: red"> *</span></label>
                                <input type="text" name="email" value="<?=$result[0]['email']?>"
                                    placeholder="Email of client"></input>
                                <label>Address <span style="color: red"> *</span></label>
                                <input type="text" name="address" value="<?=$result[0]['address']?>"
                                    placeholder="Address of client"></input>
                                <label>Status<span style="color: red"> *</span></label>
                                <select name="status" id="">
                                    <?php
                        if($result[0]['status']=="Pending")
                        {
                            echo '<option value="Pending" selected>Pending</option>';
                            echo '<option value="Cancel" >Cancel</option>';
                            echo '<option value="Delivered" >Delivered</option>';
                        } 
                        elseif($result[0]['status']=="Cancel")
                        {
                            echo '<option value="Cancel" selected>Cancel</option>';
                            echo '<option value="Pending">Pending</option>';
                            echo '<option value="Delivered">Delivered</option>';
                        }
                        elseif($result[0]['status']=="Delivered")
                        {
                            echo '<option value="Delivered"  selected>Delivered</option>';
                            echo '<option value="Pending">Pending</option>';
                            echo '<option value="Cancel">Cancel</option>';
                        } 
                        ?>
                                    </select style="display: none;">
                                    <label style="display: none;">Employee Entry <span style="color: red"> *</span></label>
                                    <select name="idee" id="idee" required style="display: none;">
                                        <?php
                                    if(isset($dmee))
                                    {
                                    foreach($dmee as $us)
                                    {
                                        if($us['user']==$_SESSION['name'])
                                        {
                                            echo '<option value="'.$us['id'].'" selected>'.$us['name_us'].'</option>';
                                        }
                                    }
                                    }
                        ?>
                                </select>
                                <br>
                                <input type="hidden" name="id" value="<?=$result[0]['id']?>">
                                <input type="submit" name="submit" value="Update"></input>
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
<script src="vendors/jquery/jquery.min.js"></script>
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
// $(document).ready(function() {

//   $(document).ready(function() {
//     $('#example').DataTable();
//   });
//   table.buttons().container().appendTo(
//     $('div.eight.column:eq(0)', table.table().container())
//   );
// });
</script>

</html>