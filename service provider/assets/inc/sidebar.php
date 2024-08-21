<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class=""><a href="emp-dashboard.php"><i class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['emp_id'];
                      $ret="select * from orrs_employee where emp_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;
                      $res=$stmt->get_result();
                  
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->emp_uname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="emp-profile.php">View</a>
                      </li>
                      <li><a href="emp-profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="emp-profile-avatar.php">Profile Avatar</a>
                      </li>
                      <li><a href="emp-profile-password.php">Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>
                  
                  <li class="parent"><a href="#"><i class="icon mdi mdi-ticket-confirmation"></i><span>Receipts</span></a>
                    <ul class="sub-menu">
                      <li><a href="emp-approved-tickets.php"><span class="badge badge-success float-right">Approved</span>View</a>
                      
                      </li>
                    </ul>
                  </li>
                                    
                  <li><a href="emp-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>