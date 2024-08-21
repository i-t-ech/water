
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
  
if(isset($_GET['del']))
{
      $id=intval($_GET['del']);
      $adn="delete from service_providers where id=?";
      $stmt= $mysqli->prepare($adn);
      $stmt->bind_param('i',$id);
      $stmt->execute();
      $stmt->close();	 

        if($stmt)
        {
          $succ = "Service Provider Details Deleted";
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
          <h2 class="page-head-title">Manage Services</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="emp-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Services</a></li>
              <li class="breadcrumb-item active">Manage Services</li>
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
                <div class="card-header">Services
                  
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
                        <th>Pricing</th>
                        <th>Company Size</th>
                        <th>Actions</th>
                      </tr> 
                    </thead>
                    <tbody>
                    <?php
                       
                        $ret="SELECT * FROM service_providers  "; 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                      <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                      
                            <td><?php echo $row->service_provider_number;?></td>
                            <td><?php echo $row->name;?></td>
                            <td><?php echo $row->location;?></td>
                            <td><?php echo $row->services;?></td>
                            <td><?php echo $row->contacts;?></td>
                            <td><?php echo $row->average_duration;?></td>
                            <td><?php echo $row->company_size;?></td>
                            <td>$<?php echo $row->pricing;?></td>
                        <td class="center"><a class ="badge badge-success" href ="emp-update-service_providers.php?id=<?php echo $row->id;?>">Update</a> 
                            <hr> <a class ="badge badge-danger" href ="emp-manage-service_provider.php?del=<?php echo $row->id;?>">Delete</a>
                            <hr><a class ="badge badge-primary" href ="emp-view-service_provider.php?id=<?php echo $row->id;?>">View</a>
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
      	//-initialize the javascript
      	App.init();
      	App.dataTables();
      });
    </script>
  </body>

</html>