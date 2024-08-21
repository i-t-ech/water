<?php
    session_start();
    include('assets/inc/config.php');
    
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['pass_id'];
    if(isset($_POST['Cancel_Train']))
    {

                        $pass_train_number = $_POST['pass_train_number'];
            $pass_train_name = $_POST['pass_train_name'];
            $pass_dep_station = $_POST['pass_dep_station'];
            $pass_dep_time = $_POST['pass_dep_time'];
            $pass_arr_station = $_POST['pass_arr_station'];
            $pass_train_fare = $_POST['pass_train_fare'];
            
            $query="update  orrs_passenger set pass_train_number = ?, pass_train_name = ?, pass_dep_station = ?, pass_dep_time = ?,  pass_arr_station = ?, pass_train_fare = ? where pass_id=?";
            $stmt = $mysqli->prepare($query); 
            $rc=$stmt->bind_param('ssssssi', $pass_train_number, $pass_train_name, $pass_dep_station, $pass_dep_time, $pass_arr_station, $pass_train_fare, $aid);
            $stmt->execute();
            if($stmt)
            {
                $succ = "Reserved Service Cancelled";
            }
            else 
            {
                $err = "Please Try Again Later";
            }
            
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
          <h2 class="page-head-title">Cancel Service </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Book Service</a></li>
              <li class="breadcrumb-item active">Cancel Service</li>
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
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider"><span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_fname" value="<?php echo $row->pass_fname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_lname" value="<?php echo $row->pass_lname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_phone" value="<?php echo $row->pass_phone;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pass_addr" value="<?php echo $row->pass_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>

                    
                    <?php
                        $id=$_GET['pass_id'];
                        $ret="select * from orrs_passenger where pass_id=?";
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$id);
                        $stmt->execute() ;
                        $res=$stmt->get_result();
                        
                        while($row=$res->fetch_object())
                    {
                    ?>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Service Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="Service Number" placeholder="<?php echo $row->pass_train_number;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="Name" placeholder="<?php echo $row->pass_train_name;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Location</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="Location" placeholder="<?php echo $row->pass_dep_station;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Contacts</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="Contacts" placeholder="<?php echo $row->pass_arr_station;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Services</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="Services" placeholder="<?php echo $row->pass_dep_time;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Pricing</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" readonly name="pricing" placeholder="<?php echo $row->pass_train_fare;?>"  id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <?php }?>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-outline-primary" value ="Cancel Service" name = "Cancel_Service" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <?php }?>
        
        </div>
        
        <?php include('assets/inc/footer.php');?>
        
      </div>

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