<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class=""><a href="dashboard.php"><i class="icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['pass_id'];//assaign session a varible [PASSENGER ID]
                      $ret="select * from orrs_passenger where pass_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->pass_uname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="profile.php">View</a>
                      </li>
                      <li><a href="profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="profile-avatar.php">Profile Avatar</a>
                      </li>
                      <li><a href="profile-password.php">Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-train"></i><span>Service Providers</span></a>
                  
                    <ul class="sub-menu">
                       <li><a href="all-available-services.php">All Available Service Providers</a>
                       <li><a href="search-available-service providers.php">Search Service Providers</a>
                    </li>
                      
                    </ul>
                
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Book Service</span></a>
                    <ul class="sub-menu">
                      <li><a href="book-service.php">Reserve Service</a>
                      </li>
                      <li><a href="cancel-service.php">Cancel Service</a>
                      </li>
                      
                    </ul>
                  </li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-ticket-confirmation"></i><span>Receipts</span></a>
                    <ul class="sub-menu">
                    <li><a href="pass-checkout-ticket.php">Checkout</a>
                      </li>
                      <li><a href="confirm-receipt.php">Confirm Payments</a>
                      </li>
                      <li><a href="print-receipt.php">Print</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="chat.php"><i class="icon mdi mdi-email"></i><span>Messages</span></a>                   
                  <li><a href="logout.php "><i class="icon mdi mdi-exit-run"></i><span>Logout</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>