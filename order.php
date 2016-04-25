<?php
require_once 'dbConfig.php';
session_start();
?>

<?php
    $servername = 'localhost';
    $username = 'root';
    $passwordu = 'chen2016';
// Create connection
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        $email = $_SESSION['email'];
        $fromName = $_POST['fromName'];
        $fromEmail = $_POST['fromEmail'];
        $fromAddress = $_POST['fromAddress'];
        $fromCity = $_POST['fromCity'];
        $fromState = $_POST['fromState'];
        $fromZip = $_POST['fromZip'];

        $toName = $_POST['toName'];
        $toEmail = $_POST['toEmail'];
        $toAddress = $_POST['toAddress'];
        $toCity = $_POST['toCity'];
        $toState = $_POST['toState'];
        $toZip = $_POST['toZip'];
        
        $trackingnum = date('YmdHis').strtok($email, '@'); 



    echo "<script> validateForm(); </script>";

    $sql = "INSERT INTO shipment ".
        "(email, fromName, fromEmail, fromAddress, fromCity, fromState, fromZip, toName, toEmail, toAddress, toCity, toState, toZip, trackingnum) ".
          "VALUES ".
        "('$email','$fromName', '$fromEmail', '$fromAddress','$fromCity','$fromState','$fromZip','$toName','$toEmail','$toAddress','$toCity','$toState','$toZip','$trackingnum')";
	mysqli_select_db($conn, DB_NAME);

    $retval = mysqli_query( $conn, $sql );
    
    if(! $retval )
    {
        die("<script>alert('Error loading database.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
    }
    echo "<script>alert('Order Completed!');location.href='member.php';</script>";
    mysqli_close($conn);

?>





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

    $mail->setFrom('pyuan4095@gmail.com', 'UTickets');
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
