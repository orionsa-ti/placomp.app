<?php

//echo phpinfo();

include "odbc_conf.php";

$connect = odbc_connect($odbc_conn, $user, $passwd);

if ($connect) {
    //echo "Connection succeeded.";
    $result = odbc_tables($connect);

    $i = 1;

	$tables = array();
	echo "<pre>";
	while (odbc_fetch_row($result)){
		if(odbc_result($result,"TABLE_TYPE")=="TABLE"){
			echo"<br>$i - ".odbc_result($result,"TABLE_NAME");
			$i++;
		}
	}
	echo "</pre>";

	/*
	$sql = "SELECT * FROM idcadcli";
	//$sql = "SELECT endcli FROM idcadcli WHERE guecli LIKE 'ORION%'";
	$res = odbc_exec($connect, $sql);
	while( $row = odbc_fetch_array($res) ) { 
    	echo "<br>";
    	echo "<pre>";
    	print_r($row);
    	echo "</pre>";
	}
	*/

}
else {
    echo "Connection failed.";
}

function getTables(){

}

?>