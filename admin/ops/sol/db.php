<?php
include ("../../db/DB.Class.php");
$db=new DB();
if(!isset($_GET['soid'])) 
    exit();
$id=$_GET['soid'];
$sql="select code from solution where soid=$id";
$res=$db->dql($sql);
$row=$res->fetch_assoc();
echo $row['code'];
//return $row['code'];
?>
