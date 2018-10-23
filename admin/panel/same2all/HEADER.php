<header class="main-header">
<!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img class="homelogo1" src="../../images/coffeetime_logo_mini.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="homelogo" src="../../images/coffeetime_logo.png"></span>
    </a>
<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-success"><?php if ($msg["msgtotal"] > 10){
															echo '10';
														}else{
															echo $msg["msgtotal"];
															 }
												?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Έχετε <?php if ($msg["msgtotal"] > 10){ echo '10'; }else{ echo $msg["msgtotal"]; } ?> ειδοποιήσεις</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<?php
					$query = $connect->query("SELECT notifications.*, admins.*, adminimages.* FROM admins, adminimages, notifications WHERE admins.AdminID = adminimages.AdminID AND 
											  admins.AdminID = notifications.AdminID ORDER BY Notification_ID DESC LIMIT 10;");
	if($query->num_rows) {
		while($r = $query->fetch_assoc()) {
			
			?>
			<li><!-- start message -->
                    <a href="allnotifications.php">
                      <div class="pull-left">
                        <div align="center">
					<div class="userimage" style="
						background-image:url(../../<?php echo $r["AdminImage"]; ?>); 
						background-size:cover;     
						height: 40px;
						width: 40px;
						border-radius: 50%;
						max-width: 40px;
						max-height: 40px;
					"></div></div>
                      </div>
                      <h4>
                        <?php echo $r["FirstName"]; ?> <?php echo $r["Surname"]; ?>
                      </h4>
                      <div class="messagewidth">
                      <?php echo $r["Message"]; ?>
					  </div>
                    </a>
                  </li>
			<?php 
											}
						} 
			?>


                </ul>
              </li>
              <li class="footer"><a href="allnotifications.php">Εμφάνιση όλων</a></li>
            </ul>
          </li>
      
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="../../<?= $admindata_2['AdminImage']; ?>" height="25" width="25" style="margin-right: 5px;border-radius: 50%;object-fit: cover;object-position: 0 0%;">				
              <span class="hidden-xs"><?= $admindata_1["UserName"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
				<img src="../../<?= $admindata_2['AdminImage']; ?>" height="90" width="90" style="border-radius: 50%;object-fit: cover;object-position: 0 0%;">				

                <p>
                  <?= $admindata_1["UserName"]; ?>
                  <small>Εγγεγραμμένος από:  <?= $admindata_1['RegisterDate']; ?></small>
				  <small><?= $admindata_1['Description']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../login/logout.php" class="btn btn-danger btn-flat">Αποσύνδεση</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
</header>