<?php
    if (!isset($_POST['c']) || !isset($_POST['u'])){
        echo "Error";
        exit;
    }
    $cid = intval($_POST['c']);
    $arr = $_POST['u'];
    include ("../../db/DB.Class.php");
    $db = new DB();
    $sql = "select * from contest where cid = $cid";
    $res = $db->dql($sql);
    if ($res && $res->num_rows > 0){
        $row = $res->fetch_assoc();
        $type = intval($row['type']);
        if ($type == 0){
            for($i=0;$i<count($arr);$i++)
            {
                $sql="select uid from user where username='"."$arr[$i]'";
                $res=$db->dql($sql);
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    UpdateUserContest($row['uid'],$cid);
                }
            }
            echo "添加成功";
        } else {
            for ($i = 0;$i < count($arr);$i++) {
                //deal team;
                $sql="select tid from team where name='"."$arr[$i]'";
                $res=$db->dql($sql);
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    UpdateTeamContest($row['tid'],$cid);
                    UpdateTeamUsers($row['tid'],$cid);
                }
            }
            echo "添加成功";
        }

    } else {
        echo "Error";
    }

    function UpdateTeamUsers($tid,$cid)
    {
        $db=new DB();
        $sql="select uid from user where tid=$tid";
        $res=$db->dql($sql);
        if($res->num_rows>0)
        {
            while($row=$res->fetch_assoc())
            {
                UpdateUserContest($row['uid'],$cid);
            }        
        }
    }
    function UpdateTeamContest($tid,$cid)
    {
        if(IsExistContestTeam($tid,$cid)==false)
        {
            $db=new DB();
            $sql="insert into contest_team (cid,tid,ischeck) values($cid,$tid,1)";
            $db->dql($sql);
        }
    }
    function UpdateUserContest($uid,$cid)
    {
        if(IsExistContestUser($uid,$cid)==false)
        {
            $db=new DB();
            $sql="insert into contest_user (cid,uid,ischeck) values($cid,$uid,1)";
            $db->dql($sql);
        }   
    }
    function IsExistContestTeam($tid,$cid)
    {
        $sql="select tid from contest_team where cid=$cid and tid=$tid";
        $db=new DB();
        $res=$db->dql($sql);
        if($res->num_rows>0)
        {
            $sql="update contest_team set ischeck=1 where cid=$cid and tid=$tid";
            $db->dql($sql);
            return true;
        }
        return false;
    }
    function IsExistContestUser($uid,$cid)
    {
        $sql="select uid from contest_user where cid=$cid and uid=$uid";
        $db=new DB();
        $res=$db->dql($sql);
        if($res->num_rows>0)
        {
            $sql="update contest_user set ischeck=1 where cid=$cid and uid=$uid";
            $db->dql($sql);
            return true;
        } 
        return false;
    }
?>
