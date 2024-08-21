
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['pass_id'];
?>

<!DOCTYPE html>
<html lang="en">

  <?php include('assets/inc/head.php');?>
  
  <body>
    <div class="be-wrapper be-fixed-sidebar">
    
      <?php include('assets/inc/navbar.php');?>
      
      
      <?php include('assets/inc/sidebar.php');?>
      

      <div class="be-content">
      <div class="page-head">
          <h2 class="page-head-title">Book Service Provider</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Book Service Provider</a></li>
              <li class="breadcrumb-item active">Reserve Service Provider</li>
            </ol>
          </nav>
        </div>

        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Please Book Your Service Provider Here                  
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                   
                        <tr>
                    
                        <th>Service Providers Number</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Services</th>
                        <th>Pricing</th>
                        <th>Average Duration</th>
                        <th>Pricing</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                                                $ret="SELECT * FROM service_providers  "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->service_provider_number;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->location;?></td>
                        <td class="center"><?php echo $row->services;?></td>
                        <td class="center"><?php echo $row->contacts;?></td>
                        <td class="center"><?php echo $row->average_duration;?></td>
                        <td class="center"><?php echo $row->company_size;?></td>
                        <td class="center">$<?php echo $row->pricing;?></td>
                    
                        <td class="center">
                        <a href="book-specific-service.php?id=<?php echo $row->id?>"><button class="btn btn-success btn-sm">Book</button></a>
                        </td>
                        </tr>
                      </tr>
                        <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
         
         <?php include('assets/inc/footer.php');?>
         
        </div>
      </div>
     
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	
      	App.init();
      	App.dataTables();
      });
    </script>
  </body>

</html>