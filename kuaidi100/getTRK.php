<?php
	require_once '../dbConfig.php';

		$artTRK = $_GET["artTRK"];//artificial tracking number

        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        $query = "SELECT express1,exp1trackingnum,express2,exp2trackingnum FROM shipment WHERE trackingnum='$artTRK'";

        $result = $dbc->query($query);
        
        

		while($row=$result->fetch_array()){
			//echo "<a href=kuaidi100/example.html?trk=" .($row[0]). ">".($row[0])."</a><br>";
			echo $row[0]. "," ,$row[1]. "," .$row[2]. "," ,$row[3];
		}


 ?>
 