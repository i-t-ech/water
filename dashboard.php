<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['pass_id'];
?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include("assets/inc/head.php");?>
  
  <body>

    <div class="be-wrapper be-fixed-sidebar">

   
     <?php include("assets/inc/navbar.php");?>
      
      <?php include('assets/inc/sidebar.php');?>
     
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="my-booked-service.php">
                <div class="widget widget-tile">
                  <div class="chart sparkline"><i class="material-icons">add_cart</i></div>
                  <div class="data-info">
                    <div class="desc">Booked Service Provider</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="cancel-service.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><i class ="material-icons">backspace</i></div>
                    <div class="data-info">
                      <div class="desc">Cancel Booking</div>
                    </div>
                  </div>
              </a>
            </div>
			
            <div class="col-12 col-lg-6 col-xl-4">
              <a href="print-receipt.php">
                <div class="widget widget-tile">
                  <div class="chart sparkline" ><i class ="material-icons">burst_mode</i></div>
                  <div class="data-info">
                    <div class="desc">Receipts</div>
                  </div>
                </div>
              </a>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Available Service Providers
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                    <tr>
                    
                        <th>Service Providers Number</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Services</th>
                        <th>Contacts</th>
                        <th>Average Duration</th>
                        <th>Company Size</th>
                        <th>Pricing</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM service_providers ORDER BY RAND() LIMIT 20 "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $row->service_provider_number;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->location;?></td>
                            <td><?php echo $row->services;?></td>
                            <td><?php echo $row->contacts;?></td>
                            <td><?php echo $row->average_duration;?></td>
                            <td><?php echo $row->company_size;?></td>
                            <td>$<?php echo $row->pricing;?></td>
                           
                            <td class="center"><a class ="badge badge-success" href ="chat.php?id=<?php echo $row->id;?>">Message</a>
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
         
        </div>
        
        <?php include('assets/inc/footer.php');?>
        
      </div>
     
    </div>

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
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
      	App.dashboard();
      
      });
    </script>
  </body>

</html>