<?php
   if(!isset($_POST['cid']))
   {
       echo "Error";
       exit;
   }
   $cid = intval($_POST['cid']);
   $pros= json_decode($_POST['prs']);
   include ("../../db/DB.Class.php");
   $db=new DB();
   $sql="delete from contest_problem where cid=$cid";
   $db->dml($sql);
   for($i=0;$i<count($pros);$i++)
   {
       $sql=sprintf("insert into contest_problem(pid,cid,newname,newid) values(%d,%d,'%s','%s')",$pros[$i][0],$cid,$pros[$i][1],$pros[$i][2]);
       $db->dml($sql);
   }

?>
