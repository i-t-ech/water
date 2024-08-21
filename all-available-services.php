
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
    
      <?php include("assets/inc/navbar.php");?>
      
        
      <?php include('assets/inc/sidebar.php');?>
      

      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Service Providers</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Service Providers</a></li>
              <li class="breadcrumb-item active">Available Service Providers</li>
            </ol>
          </nav>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-table">
                <div class="card-header">Available Service Providers
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered table-hover">
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
          
                        $ret="SELECT * FROM service_providers ";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                           <tr class="odd gradeX even gradeC odd gradeA even gradeA ">
                        <td><?php echo $row->service_provider_number;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->location;?></td>
                        <td class="center"><?php echo $row->services;?></td>
                        <td class="center"><?php echo $row->contacts;?></td>
                        <td class="center"><?php echo $row->average_duration;?></td>
                        <td class="center"><?php echo $row->company_size;?></td>
                        <td class="center">$<?php echo $row->pricing;?></td>
                      </tr>
                    <?php $cnt = $cnt+1; }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
      <?php include('assets/inc/footer.php');?>
      
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	
      	App.init();
      });
      
    </script>
  </body>

</html>