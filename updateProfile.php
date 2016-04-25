<?php
session_start();
?>

<html>
<body>

<?php
    $servername = 'localhost';
    $username = 'root';
    $passwordu = 'chen2016';
// Create connection
    $conn = new mysqli($servername, $username, $passwordu);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(! get_magic_quotes_gpc() ){
        $Username = addslashes ($_POST['name']);
        $Address = addslashes ($_POST['address']);
        $City = addslashes ($_POST['city']);
        $State = addslashes ($_POST['state']);
        $ZIP = addslashes ($_POST['zip']);
    }
    else{
        $Username = $_POST['name'];
        $Address = $_POST['address'];
        $City = $_POST['city'];
        $State = $_POST['state'];
        $ZIP = $_POST['zip'];
    }

    echo "<script> validateForm(); </script>";
    $email = $_SESSION['email'];
    echo $email;
    echo $Username;
    $sql = "UPDATE users SET name='$Username', address='$Address', city='$City', zip = '$ZIP' WHERE email='$email';";

	mysqli_select_db($conn, 'shipment');
    //echo "<h2>" . $_POST['zip'] . "</h2>";
    //echo "<script>alert($_POST['zip']);</script>";
    $retval = mysqli_query( $conn, $sql );
    
    if(! $retval )
    {
        die("<script>alert('This username has been used. please try another one.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
    }
    mysqli_close($conn);
    //echo "<script>alert('Registration Completed!');location.href='index.php';</script>";
    

?>

<!--
<?php
	$Username = $_POST['name'];
    $Email = $_POST['email'];
    require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'pyuan4095@gmail.com';                 // SMTP username
    $mail->Password = 'xianhuapeishi43C';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('pyuan4095@gmail.com', '');
    $mail->addAddress($Email, $Username);     // Add a recipient                        

    $mail->Subject = 'Thanks for joining UTickets';
    $mail->Body    = 'Your signup is complete! Now you have access to all UTickets excellent services!';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
?>
-->
</body>
</html>
