<script>
function validateForm() {
  var name = document.getElementById("name_catalog").value;
  var pr = document.getElementsByName("prioritize_catalog")[0].value;
  var dis = document.getElementsByName("display_catalog")[0].value;

  if (name == "") {
    alert("Please choose employee entry!");
    return false;
  }
  if (pr!="1" && pr!="0") {
    alert("Please fill out true prioritize!");
    return false;
  }

  if (dis!="1" && dis!="0") {
    alert("Please fill out true display!");
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
              <div class="ui blue ribbon icon label">Insert Catalog Information</div>
              <br><br>
              <?php
              // echo var_dump($result);
              ?>
                <form action="admin.php?act=insert_catalog" method="POST" onsubmit="return validateForm()">
                    <label>Name</label>
                    <input type="text"  id="name_catalog" name="name_catalog" placeholder="Name of catalog"></input>
                    <label>Priortize</label>
                    <input type="text" id="prioritize_catalog" name="prioritize_catalog" placeholder="Priortize of product 1 is yes or 0 is no"></input>
                    <label>Display</label>
                    <input type="text" id="display_catalog" name="display_catalog" placeholder="Display of catalog 1 yes or 0 no" ></input>
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
<script src="vendors/jquery/jquery.min.js">
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