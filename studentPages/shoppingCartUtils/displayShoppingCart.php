<?php
include_once("../../php/dbconnect.php");
$qStr = "SELECT * FROM ShoppingCart";
$qRes = $db->query($qStr);

if($qRes != FALSE)
    while($shopRow = $qRes->fetch()){
        $rows = array();
        $rows[0]= $shopRow['studentID'];
        $rows[1]= $shopRow['sectionID'];
        $rows[2]= $shopRow['placePref'];
        print_r(json_encode($rows));
        print "</br>";
    }
?>
