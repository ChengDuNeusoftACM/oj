<?php
include ("../../db/DB.Class.php");
$db=new DB();
if(!isset($_POST['soid'])) 
{
    exit();
}
$id=$_POST['soid'];
$sql="select code from solution where soid=$id";
$res=$db->dql($sql);
$row=$res->fetch_assoc();
echo $row['code'];
//$this->ajaxReturn($row['code'],"json");
//return $row['code'];
?>
