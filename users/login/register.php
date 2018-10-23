<?php
require '../../connection.php';
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
session_name("session3");
session_start();
if (isset($_POST['register'])) {
	
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['surname'] = $_POST['surname'];

// Escape all $_POST variables to protect against SQL injections
$name = $connect->escape_string($_POST['name']);
$surname = $connect->escape_string($_POST['surname']);
$username = $connect->escape_string($_POST['username']);
$email = $connect->escape_string($_POST['email']);
$password = $connect->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $connect->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $connect->query("SELECT * FROM users WHERE `E-mail`='$email'") or die($connect->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO `users` (`UserName`,`FirstName`, `Surname`, `Password`, `E-mail, `Hash`) 
	                     VALUES ('$username', '$name', '$surname', '$password', '$email', '$hash');";
						 
	
						 

    // Add user to the database
    if ( $connect->query($sql) ){
		
	$result11 = $connect->query("SELECT * FROM users WHERE `UserName`='$username' AND `FirstName`='$name' AND `Surname`='$surname' AND `E-mail`='$email'");
	$user11 = $result11->fetch_assoc();
	$_SESSION['userid'] = $user11['UserID'];
	$userid = $_SESSION['userid'];
	
	$sql = "INSERT INTO `userimages` (`UserID`) VALUES ('$userid');";
	
	$connect->query($sql);

		$domain = $_SERVER['SERVER_NAME'];
        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['onlinee'] = 0; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$username.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://'.$domain.'/users/login/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: unverified.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}
}