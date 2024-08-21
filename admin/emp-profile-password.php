<?php
    session_start();
    include('assets/inc/config.php');
    
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['admin_id'];

            if(isset($_POST['Update_Password']))

    {
                       
            $admin_pwd=sha1(md5($_POST['admin_pwd']));
            $query="update orrs_admin set admin_pwd = ? where admin_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('si', $admin_pwd, $aid);
            $stmt->execute();
                if($stmt)
                {
                    $succ1 = "Password  Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            #echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php');?>

  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    
      <?php include('assets/inc/navbar.php');?>
      

      
      <?php include('assets/inc/sidebar.php');?>
      
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Change Password </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active">Change Password | Profile Photo </li>
            </ol>
          </nav>
        </div>
        <?php if(isset($succ1)) {?>
                                
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ1;?>!","success");
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
        <?php
            $aid=$_SESSION['admin_id'];
            $ret="select * from orrs_admin where admin_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;
            $res=$stmt->get_result();
            
            while($row=$res->fetch_object())
        {
        ?>     
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Change Password<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST" >
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Old Password</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="" id="inputText3" type="password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">New Password</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="admin_pwd"  id="inputText3" type="password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Confirm New Password</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name=""  id="inputText3" type="password">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-success" value ="Change Password" name = "Update_Password" type="submit">
                          <button class="btn btn-space btn-danger">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
       
        <?php }?>
        
      </div>
      
      <?php include('assets/inc/footer.php');?>
        

    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>