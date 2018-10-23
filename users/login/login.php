<?php
require '../../connection.php';
/* User login process, checks if user exists and password is correct */
// Escape email to protect against SQL injections
$email = $connect->escape_string($_POST['email']);
$result = $connect->query("SELECT * FROM users WHERE `E-mail`='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
	

    if ( password_verify($_POST['password'], $user['Password'])) {
		
		$userid = $user['UserID'];
		$result1 = $connect->query("SELECT * FROM userimages WHERE `UserID` ='$userid'");
		$user1 = $result1->fetch_assoc();
		
        $_SESSION['userid'] = $user['UserID'];
		$_SESSION['userimage'] = $user1['UserImage'];
        $_SESSION['email'] = $user['E-mail'];
		$_SESSION['username'] = $user['UserName'];
		$_SESSION['name'] = $user['FirstName'];
		$_SESSION['surname'] = $user['Surname'];
		$_SESSION['RegisterDate'] = $user['RegisterDate'];
        $_SESSION['active'] = $user['Active'];
		$_SESSION['password'] = $user['Password'];
		$_SESSION['description'] = $user['Description'];
        // This is how we'll know the user is logged in
		
		
		
		if ($_SESSION['active'] == 0){
			header("location: unverified.php");
		}else{
			
			$result4 = $connect->query("UPDATE users SET `LastUserLogin` = CURRENT_TIMESTAMP WHERE `UserID` ='$userid'");
			
			$_SESSION['onlinee'] = 1;
			header("location: ../../index.php");
		}
		
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

