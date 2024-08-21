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
        
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="user-profile">
            <div class="row">
              <div class="col-lg-12">
                <div class="user-display">
                  <div class="user-display-bg"><img src="assets/img/profile/<?php echo $row->pass_dpic;?>" alt="Profile Background"></div>
                  <div class="user-display-bottom">
                    <div class="user-display-avatar"><img src="assets/img/profile/<?php echo $row->pass_dpic;?>" alt="Avatar"></div>
                    <div class="user-display-info">
                      <div class="name"><?php echo $row->pass_fname;?> <?php echo $row->pass_lname;?> </div>
                      <div class="nick"><span class="mdi mdi-account"></span><?php echo $row->pass_uname;?></div>
                    </div>
                    
                  </div>
                </div>
                <div class="user-info-list card">
                  <div class="card-header card-header-divider">About Me<span class="card-subtitle"><?php echo $row->pass_bio;?></span></div>
                  <div class="card-body">
                    <table class="no-border no-strip skills">
                      <tbody class="no-border-x no-border-y">
                        <tr>
                          <td class="icon"><span class="mdi mdi-cake"></span></td>
                          <td class="item">Birthday<span class="icon s7-gift"></span></td>
                          <td><?php echo $row->pass_bday;?></td>
                        </tr>
                        <tr>
                          <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                          <td class="item">Mobile<span class="icon s7-phone"></span></td>
                          <td><?php echo $row->pass_phone;?></td>
                        </tr>
                        <tr>
                          <td class="icon"><span class="mdi mdi-globe-alt"></span></td>
                          <td class="item">Location<span class="icon s7-map-marker"></span></td>
                          <td><?php echo $row->pass_addr;?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
          
        <?php include('assets/inc/footer.php');?>
        
        </div>
      </div>
    <?php }?>
     
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
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	
      	App.init();
      	App.pageProfile();
      });
    </script>
  </body>

</html>