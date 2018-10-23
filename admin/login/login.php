<?php
require '../../connection.php';
/* admin login process, checks if admin exists and password is correct */
// Escape email to protect against SQL injections
$email = $connect->escape_string($_POST['email']);
$result = $connect->query("SELECT * FROM admins WHERE `E-mail`='$email'");

if ( $result->num_rows == 0 ){ // admin doesn't exist
    $_SESSION['message'] = "Admin with that email doesn't exist!";
    header("location: error.php");
}
else { // admin exists
    $admin = $result->fetch_assoc();
	

    if ( password_verify($_POST['password'], $admin['Password'])) {
		
		$adminid = $admin['AdminID'];
		$result1 = $connect->query("SELECT * FROM adminimages WHERE `AdminID` ='$adminid'");
		$admin1 = $result1->fetch_assoc();
		
        $_SESSION['adminid'] = $admin['AdminID'];
		$_SESSION['adminimage'] = $admin1['AdminImage'];
        $_SESSION['email'] = $admin['E-mail'];
		$_SESSION['username'] = $admin['UserName'];
		$_SESSION['name'] = $admin['FirstName'];
		$_SESSION['surname'] = $admin['Surname'];
		$_SESSION['RegisterDate'] = $admin['RegisterDate'];
        $_SESSION['active'] = $admin['Active'];
		$_SESSION['password'] = $admin['Password'];
		$_SESSION['description'] = $admin['Description'];
        // This is how we'll know the admin is logged in
		

		if ($_SESSION['active'] == 0){
			$_SESSION['message'] = "This account is inactive";
			header("location: error.php");
		}else{
			$_SESSION['adminonline'] = 1;
			
			$result4 = $connect->query("UPDATE admins SET `LastAdminLogin` = CURRENT_TIMESTAMP WHERE `AdminID` ='$adminid'");
			
			header("location: ../panel/index.php");
		}
		
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

