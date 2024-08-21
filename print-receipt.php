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
          <h2 class="page-head-title">Service Receipt</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="#">Dashbaord</a></li>
              <li class="breadcrumb-item"><a href="#">Receipts</a></li>
              <li class="breadcrumb-item active">Print</li>
            </ol>
          </nav>
        </div>

        <?php
                      $aid=$_SESSION['pass_id'];
            $ret="select * from orrs_passenger where pass_id=?";
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
                  <div class="col-sm-7">
                    
                  </div>
                  <div class="col-sm-5 invoice-order"><span class="invoice-id">Service Receipts For</span><span class="incoice-date"><?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?></span></div>
                </div>
                <div class="row invoice-data">
                  <div class="col-sm-5 invoice-person"><span class="name"><?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?></span><span><?php echo $row->pass_email;?></span><span><?php echo $row->pass_addr;?></span></div>
                  <div class="col-sm-2 invoice-payment-direction"></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th>Service Provider Number</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Contacts</th>
                        <th>Average Duration</th>
                        <th>Pricing</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                                                    
                            $ret="select * from orrs_passenger where pass_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$aid);
                            $stmt->execute() ;
                            $res=$stmt->get_result();
                            
                        while($row=$res->fetch_object())
                        {
                        ?>
                      <tr>
                        <td><?php echo $row->pass_train_number;?></td>
                        <td><?php echo $row->pass_train_name;?></td>
                        <td><?php echo $row->pass_dep_station;?></td>
                        <td><?php echo $row->pass_arr_station;?></td>
                        <td><?php echo $row->pass_dep_time;?></td>
                        <td>$<?php echo $row->pass_train_fare;?></td>
                      </tr>
                      <hr>
                        <?php }?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row invoice-footer">
                  <div class="col-lg-12">
                    <button id="print" onclick="printContent('printReceipt');" class="btn btn-lg btn-space btn-primary">Print</button>
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