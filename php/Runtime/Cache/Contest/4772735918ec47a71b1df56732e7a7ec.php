<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <script type="text/ecmascript">
            var registerUrl = '<?php echo U("Contest/Index/register", '', '');?>';
            var formUrl = '<?php echo U("Contest/Index/form", '', '');?>';
            var handleUrl = '<?php echo U("Contest/Index/problemlist", '', '');?>';
            var countUrl ='<?php echo U("Contest/Index/newscount", '', '');?>';
            var cid="<?php echo ($contestinfo[0]['cid']); ?>";
        </script>
        <script src="__PUBLIC__/Js/jquery-1.10.2.min.js"></script>
        <script src="__PUBLIC__/Js/bootstrap.min.js"></script>
        <script src="__PUBLIC__/Js/onload.js"></script>
        <script src="__PUBLIC__/Js/jquery-ui.min.js"></script>
        <link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet">
        <link href="__PUBLIC__/Css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="__PUBLIC__/Css/contest.css" rel="stylesheet">
    </head>
    <body>
        <div style="width: 80%; height: auto; margin: 0 auto;">
        <?php
 if($data['flag']==1) echo '<h2><span class="label label-success">Registration Successful</span></h2>'; else if($data['flag']==2) echo'<h2><span class="label label-info">You have already registered</span></h2>' ; else if($data['flag']==3) echo'<h2><span class="label label-warning">Error please try again</span></h2>'; ?>
        <table style="width: 100%" class="altrowstable" id="alternatecolor">
            <tr>
                <th class="id">Username</th>
                <th class="name">Contest</th>
                <th class="time">Result</th>
            </tr>
            <?php if(isset($data['flag'])){ echo'<tr style="background-color:#fc9f9f ">'; echo'<td style="background-color:#f87373 ">'.$data["username"].'</td>'; echo'<td>'.$data["contestname"].'</td>'; echo'<td>';if($data["result"]==0)echo'Pending'; else if($data['result']==1)echo'Accept'; else echo'Refuse';echo'</td>'; echo'</tr>'; } ?>
            <?php if(is_array($otherdata)): foreach($otherdata as $key=>$v): ?><tr>
                <td class="id"><?php echo ($v["username"]); ?></td>
                <td class="name"><?php echo ($contestname); ?></td>
                <td class="time"><?php if($v.result==0)echo'Pending'; else if($v.result==1)echo'Accept'; else echo'Refuse'?></td>
            </tr><?php endforeach; endif; ?>
        </table>
        </div>
    </body>
</html>