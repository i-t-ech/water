<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
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
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">person</i></div>
              
                <div class="data-info">
                <?php
                  
                  $result ="SELECT count(*) FROM orrs_passenger";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($pass);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Clients</div>
                  <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">receipt</i></div>
                <div class="data-info">
                <?php
                  
                  $result ="SELECT count(*) FROM orrs_train_tickets WHERE confirmation ='Approved'";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($ticket);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Booked Slots</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $ticket;?>">0</span>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">assignment_late</i></div>
                <div class="data-info">
                <?php
                 
                  $result ="SELECT count(*) FROM orrs_train_tickets where confirmation != 'Approved' ";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($pass);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Pending Tickets</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pass;?>">0</span>
                  </div>
                </div>
              </div>
            </div>


          </div>            
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Clients
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th> First name</th>
                        <th>Last name</th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Email</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM orrs_passenger ORDER BY RAND() LIMIT 10 "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?>
                            <td><?php echo $row->pass_fname;?></td>
                            <td><?php echo $row->pass_lname;?></td>
                            <td><?php echo $row->pass_phone;?></td>
                            <td><?php echo $row->pass_addr;?></td>
                            <td><?php echo $row->pass_email;?></td>
                            <td class="center"><a class ="badge badge-success" href ="chat.php">Message</a>
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
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