<?php

//Desarrollo
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db ("santa_clara", $conexion); 

//Produccion
/*
$conexion = mysql_connect("localhost", "ccr12115_admin", "n;ak*[3A_zR4");
mysql_select_db ("ccr12115_santa_clara", $conexion); 
*/


foreach ($_GET['listItem'] as $position => $item) {
    $sql = "UPDATE `equipo` SET `equi_orden` = $position WHERE `equi_id` = $item";
    mysql_query($sql, $conexion);
} 

mysql_close();

?>