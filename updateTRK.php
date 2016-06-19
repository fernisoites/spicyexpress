<?php
require_once 'dbConfig.php';
session_start();
?>

<html>
<body>

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

    if(! get_magic_quotes_gpc() ){
        $artTRK = addslashes ($_POST['artTRK']);
        $trk1 = addslashes ($_POST['trk1']);
        $trk1Num = addslashes ($_POST['trk1Num']);
        $trk2 = addslashes ($_POST['trk2']);
        $trk2Num = addslashes ($_POST['trk2Num']);
    }
    else{
        $artTRK = $_POST['artTRK'];
        $trk1 = $_POST['trk1'];
        $trk1Num = $_POST['trk1Num'];
        $trk2 = $_POST['trk2'];
        $trk2Num = $_POST['trk2Num'];
    }

    echo "<script> validateForm(); </script>";
    $email = $_SESSION['email'];
    echo $email;
    echo $Username;
    $sql = "UPDATE shipment SET express1='$trk1', exp1trackingnum='$trk1Num', express2='$trk2', exp2trackingnum = '$trk2Num' WHERE trackingnum='$artTRK';";

	mysqli_select_db($conn, DB_NAME);
    //echo "<h2>" . $_POST['zip'] . "</h2>";
    //echo "<script>alert($_POST['zip']);</script>";
    $retval = mysqli_query( $conn, $sql );
    
    if(! $retval )
    {
        die("<script>alert('This username has been used. please try another one.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
    }
    mysqli_close($conn);
    echo "<script>alert('Update Completed!');location.href='member.php';</script>";
    

?>


</body>
</html>
