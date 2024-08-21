
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['admin_id'];
  
if(isset($_GET['del']))
{
      $ticket_id=intval($_GET['del']);
      $adn="delete from orrs_train_tickets where ticket_id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$ticket_id);
      $stmt->execute();
      $stmt->close();	 

        if($stmt)
        {
          $succ = "Service Receipt Deleted";
        }
          else
          {
            $err = "Try Again Later";
          }
      
}
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
          <h2 class="page-head-title">Manage Tickets</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="emp-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Tickets</a></li>
              <li class="breadcrumb-item active">Manage Tickets</li>
            </ol>
          </nav>
        </div>
        <?php if(isset($succ)) {?>
                                
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ;?>!","success");
                            },
                                100);
                </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed!","<?php echo $err;?>!","Failed");
                            },
                                100);
                </script>

        <?php } ?>

        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Tickets
                  <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover table-fw-widget" id="table1">
                    <thead class="thead-dark">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>client number</th>
                        <th>service booked</th>
                        <th>company size</th>
                        <th>pricing</th>
                        <th>Payment Code</th>
                        <th>Actions</th>
                      </tr> 
                    </thead>
                    <tbody>
                    <?php
                                                $ret="SELECT * FROM `orrs_train_tickets` "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->pass_name;?></td>
                        <td><?php echo $row->pass_email;?></td>
                        <td><?php echo $row->pass_addr;?></td>
                        <td><?php echo $row->train_no;?></td>
                        <td class="center"><?php echo $row->train_dep_stat;?></td>
                        <td class="center"><?php echo $row->train_arr_stat;?></td>
                        <td class="center">$<?php echo $row->train_fare;?></td>
                        <td class="center"><?php echo $row->fare_payment_code;?></td>
                        <td class="center"><a class ="badge badge-success" href ="emp-confirm-tickets.php?ticket_id=<?php echo $row->ticket_id;?>">Manage</a> 
                            <hr> <a class ="badge badge-danger" href ="emp-manage-tickets.php?del=<?php echo $row->ticket_id;?>">Delete</a>
                        </td>                      
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