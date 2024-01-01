<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Insert Catalog Information</div>
              <br><br>
              <?php
            //   echo var_dump($result);
              ?>
                <form action="admin.php?act=insert_client" method="POST">
                    <label>Last Name</label>
                    <input type="text" name="last_name_c" placeholder="Please enter last name"></input>
                    <label>First Name</label>
                    <input type="text" name="first_name_c" placeholder="Please enter first name"></input>
                    <label>Sex</label>
                    <select name="sex_c" id="">
                      <option value="0">Choose Sex</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                      <option value="3">Other</option>
                    </select>
                    <label>Address</label>
                    <input type="text" name="address_c" placeholder="Please enter your address" ></input>
                    <label>Email</label>
                    <input type="text" name="email_c" placeholder="Please enter your email" ></input>
                    <label>Phone</label>
                    <input type="text" name="phone_c" placeholder="Please enter your phone" ></input>
                    <label>User</label>
                    <input type="text" name="user_c" placeholder="Please enter your user" ></input>
                    <label>Password</label>
                    <input type="password" name="password_c" placeholder="Please enter your password" ></input>
                    <input type="submit" name="submit" value="submit"></input>
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

</html>