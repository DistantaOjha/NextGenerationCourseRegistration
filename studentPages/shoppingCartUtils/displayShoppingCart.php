<?php
include_once("../../php/dbconnect.php");
$qStr = "SELECT * FROM ShoppingCart";
$qRes = $db->query($qStr);
$rows = array();
if($qRes != FALSE)
    $counter = 0;
    while($shopRow = $qRes->fetch()){
        $rows[$counter]['studentID']= $shopRow['studentID'];
        $rows[$counter]['sectionID']= $shopRow['sectionID'];
        $rows[$counter]['placePref']= $shopRow['placePref'];
        $counter = $counter + 1;
    }
    //print_r($rows);
    //print "</br>";
    //print "</br>";
    print(json_encode($rows));
?>
