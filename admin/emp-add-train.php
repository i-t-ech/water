<?php
    session_start();
    include('assets/inc/config.php');
    
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['emp_id'];
    if(isset($_POST['add_service_providers']))
    {

            $service_provider_number= $_POST['number'];
            $name = $_POST['name'];
            $location = $_POST['location'];
            $services = $_POST['services'];
            $contacts = $_POST['contacts'];
            $average_duration = $_POST['average_duration'];
            $company_size = $_POST['company_size'];
            $pricing = $_POST['pricing'];
            
            $query="insert into service_providers (service_provider_number, name, location, services, contacts, average_duration, company_size, pricing) values(?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            
            $rc=$stmt->bind_param('ssssssss', $service_provider_number, $name, $location, $services, $contacts, $average_duration, $company_size, $pricing);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Service provider Added";
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
          <h2 class="page-head-title">Add Service provider</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="pass-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Services</a></li>
              <li class="breadcrumb-item active">Add Services provider</li>
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
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-success">
                <div class="card-header card-header-divider">Add New Service provider<span class="card-subtitle"> Please Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Service provider number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="number" id="inputText3" type="text" placeholder="Enter Service Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="name" id="inputText3" type="text" placeholder="Enter Service Providers Number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Location</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="location"  id="inputText3" type="text" placeholder=" Enter Location">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Services</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="services"  id="inputText3" type="text" placeholder="Enter Service">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Contacts</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="contacts"  id="inputText3" type="text" placeholder="Enter Contacts">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Average duration</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="average_duration" id="inputText3" type="text" placeholder="Enter Average Duration">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Company size</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="company_size"  id="inputText3" type="text" placeholder="Enter Company Size- employees">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Pricing</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="pricing"  id="inputText3" type="text" placeholder="$">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-success" value ="Add Service" name = "add_service_providers" type="submit">
                          <button class="btn btn-space btn-danger">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
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