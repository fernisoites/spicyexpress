
<?php
if(strcmp($_SERVER['SERVER_NAME'],'spicychicken.tech')==0){
define ("DB_HOST", "localhost"); // set database host

define ("DB_USER", "root"); // set database user

define ("DB_PASSWORD", "chen2016"); // set database password

define ("DB_NAME", "shipment"); // set database name
} else {

define ("DB_HOST", "localhost:3306"); // set database host

define ("DB_USER", "sysadmin"); // set database user

define ("DB_PASSWORD", "sysadmin"); // set database password

define ("DB_NAME", "shipment"); // set database name
}
?>
