<?php
#AUTHOR: DISTANTA OJHA
include_once("../../php/dbconnect.php");
$qStr = "SELECT studentID, sectionID, placePref, seats FROM ShoppingCart NATURAL JOIN Sections";
$qRes = $db->query($qStr);

if($qRes != FALSE)
    while($shopRow = $qRes->fetch()){
        $rows = array();
        $rows[0]= $shopRow['studentID'];
        $rows[1]= $shopRow['sectionID'];
        $rows[2]= $shopRow['placePref'];
        $rows[3]= $shopRow['seats'];
        print_r(json_encode($rows));
        print "</br>";
    }
?>
