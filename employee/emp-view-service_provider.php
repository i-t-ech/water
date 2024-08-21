<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['emp_id'];
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
          <h2 class="page-head-title">Service Provider Information</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Service Provider</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </nav>
        </div>

        <?php
          
            $aid=$_GET['id'];
            $ret="select * from service_providers where id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;
            $res=$stmt->get_result();
            
            while($row=$res->fetch_object())
            {
        ?>
       
        <div class="main-content container-fluid">
          <div class="row">
		  
            <div class="col-lg-12">

         
              <div id='printReceipt' class="invoice">
                <div class="row invoice-header">
                  
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-bordered" >
                    <thead>
                      <tr>
                        <th>Service Provider Number</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Contacts</th>
                        <th>Average Duration</th>
                        <th>Pricing</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      <tr>
                        <td><?php echo $row->service_provider_number;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->services;?></td>
                        <td><?php echo $row->contacts;?></td>
                        <td><?php echo $row->average_duration;?></td>
                        <td>$<?php echo $row->pricing;?></td>
                      </tr>
                      <hr>
                        
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row invoice-footer">
                  <div class="col-lg-12">
                    <button id="print" onclick="printContent('printReceipt');" class="btn btn-lg btn-space btn-secondary">Print</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
        <?php }?>
    
    <?php include('assets/inc/footer.php');?>
    
      </div>
      
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
    
    <script>
      function printContent(el){
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        }
     </script>
  </body>

</html>