<?php
    if(!isset($_POST['pid']))
    {
        echo "false,Error";
        exit;
    }
   $pid=$_POST['pid'];
   if(is_numeric($pid)==false)
   {
       echo "false,题目编号必须是数字";
       exit;
   }
   $pid=intval($pid);
   include ("../../db/DB.Class.php");
   $db=new DB();
   $sql="select pname from problem where pid =$pid";
   $res=$db->dql($sql);
   if($res&& $res->num_rows>0)
   {
       $row=$res->fetch_assoc();
       echo "success,".$row['pname'];
   }
   else
      echo "false,null";
?>
