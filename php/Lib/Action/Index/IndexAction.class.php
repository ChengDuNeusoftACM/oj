<?php
class IndexAction extends Action {
    public function Index(){
    	$model=new Model();
    	$sql='SELECT  * FROM contest ORDER BY create_time DESC limit 0,6;';
    	$data=$model->query($sql);
    	$this->data=$data;
    	$this->total=count($data);
    	$this->display();
	}
	public function Login(){
		
    	$username=i('username','','');
    	$password=i('password','','md5');
    	$user=m('user')->where(array('username' => $username))->find();
		if(!$user)
			$this->ajaxreturn(1,'json');
		else if($user["password"]!=$password)
			$this->ajaxreturn(1,'json');
		else{
			session('uid',$user['uid']);
			session('username',$user['username']);
			cookie('username',$user['username']);
			$this->ajaxreturn(0,'json');
		}
	}
	public function Register(){
		
		$data['username']=I('username','','');
		$data['name']=I('username','','');
		$data['password']=I('password','','md5');
		$data['email']=I('email','','');
		$user=M('user');
		$id=$user->add($data);
		session('uid',$id);
		session('username',$data['username']);
		$this->ajaxReturn(0,'json');
	}
	public function checkValue(){

		$username=I('username','','');
		$flag=I('flag','','');
		if($flag==0){
		$user=m('user')->where(array('username' => $username))->find();
		if($user){
			$this->ajaxreturn(0,'json');
		}
		else{
			$this->ajaxreturn(1,'json');
		}
		}
		else if($flag==1){
			if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->ajaxreturn(0,'json');
		}
		else{
			$this->ajaxreturn(1,'json');
		}
		}
		else{
			session('username',NULL);
			session('uid',NULL);
			$this->ajaxreturn(0,'json');
		}
	}
	public function verify(){
		 ob_clean();
		import('ORG.Util.Image');
		Image::buildImageVerify(6,5,'png',80,34);
	}
	public function ProblemList(){
		$page=I('page',1); //获取要显示的页面值
		$info=I('info',NULL);
		$num=10; //每页显示数目
		$model=new Model();
		if($info==NULL){
			$sql="select * from problem;";
		}
		else{
			$sql='select * from problem where problem.pname like "%'.$info.'%" or problem.source like "%'.$info.'%";';
		}
		$total=count($model->query($sql));
		$pages=ceil($total/$num);
		$this->pages=$pages;
		$this->nowpage=$page;
		$this->info=$info;
		$offset=($page-1)*$num;
		if($info==NULL){
			$sql="select * from problem limit $offset,$num;";
		}
		else{
			$sql="select * from problem where problem.pname like '%".$info."%' or problem.source like '%".$info."%' limit $offset,$num;";
		}
		$data=$model->query($sql);
		$this->data=$data;
		$this->display();
	}
	public function Ranklist(){
		$page=I('page',1); //获取要显示的页面值
		$info=I('info',NULL);
		$num=10; //每页显示数目
		$model=new Model();
		if($info==NULL){
			$sql="select * from user;";
		}
		else{
			$sql='SELECT * FROM user where username like '%".$info."%' or name like '%".$info."%' order by solved desc,solved*1.0/submit desc ';
		}
		$total=count($model->query($sql));
		$pages=ceil($total/$num);
		$this->pages=$pages;
		$this->nowpage=$page;
		$this->info=$info;
		$offset=($page-1)*$num;
		
		if($info==NULL){
			$sql="SELECT * FROM user order by solved desc,solved*1.0/submit desc limit $offset,$num;";
		}
		else{
			$sql="SELECT * FROM user where username like '%".$info."%' or name like '%".$info."%' order by solved desc,solved*1.0/submit desc limit $offset,$num;";
		}
		$data=$model->query($sql);
		$this->data=$data;
		$this->display();
	}
	public function User(){
		$user=I('user');
		if($user==NULL){
			$this->error("no data");
		}
		$model=new Model();
		$sql='select uid from user order by solved desc';
		$rankinfo=$model->query($sql);
		
		$sql='select count(*) from oj.problem';
		$total=$model->query($sql);
		$sql='select * from user where uid='.$user;
		$info=$model->query($sql);
		for($i=0;$i<count($rankinfo);$i++){
			if((int)$rankinfo[$i]['uid']==$user){
				$info[0]['rank']=$i+1;	
				break;
			}
		}
		$this->info=$info;
		$sql='select * from user where tid=(select tid from user where uid='.$user.');';
		$teaminfo=$model->query($sql);

		$this->teaminfo=$teaminfo;
		$sql='select * from team where tid=(select tid from user where uid='.$user.');';
		$team=$model->query($sql);
		$this->team=$team;
		for($i=0;$i<count($teaminfo);$i++){
			if($teaminfo[$i]['uid']==$team[0]['head_id']){
				$captain=$teaminfo[$i]['username'];break;}
		}
		$this->captain=$captain;
		$total=(int)$total[0]['count(*)'];
		$this->total=$total;
		for($i=1;$i<=$total;$i++){
			$data[$i]=0;
		}
		$sql='SELECT distinct s.pid FROM oj.user u,oj.solution s where u.uid='.$user.' and u.uid=s.uid and s.result=0';
		$wrong=$model->query($sql);
		for($i=0;$i<count($wrong);$i++){
			$data[(int)$wrong[$i]['pid']]=1;
		}
		$sql='SELECT distinct s.pid FROM oj.user u,oj.solution s where u.uid='.$user.' and u.uid=s.uid and s.result=1';
		$right=$model->query($sql);
		for($i=0;$i<count($right);$i++){
			$data[(int)$right[$i]['pid']]=2;
		}

		$this->data=$data;
		if($user==$_SESSION['uid']&&$user==$team[0]['head_id']){
			$sql='select * from team_invite where team_id='.$info[0]['tid'];

			$inviteinfo=$model->query($sql);
			$this->invite_count=count($inviteinfo);
			for($i=0;$i<count($inviteinfo);$i++){
				$sql='select * from user where uid='.$inviteinfo[$i]['user_id'];
				$invite_info[$i]=$model->query($sql)[0];
			}
			$this->invite_info=$invite_info;
		}
		if(empty($team)==true){
			$sql='select * from team_invite where user_id='.$user;

			$invited_info=$model->query($sql);
			for($i=0;$i<count($invited_info);$i++){
				$sql='select * from team where tid='.$invited_info[$i]['team_id'];
				$Accept_info[$i]=$model->query($sql)[0];
				$sql='select * from user where uid='.$Accept_info[$i]['head_id'];
				$Accept_info[$i]['capname']=$model->query($sql)[0]['username'];
				$this->Accept_info=$Accept_info;
			}
			$this->invited_info=$invited_info;
		}
		$this->display();
	}
	public function Problem(){
		$model=new Model();
		$problemid=intval($_GET['problemid']);
		$data=M('problem')->where(array('pid' => $problemid))->find();
		$sql="select count(*) from problem";
		
		$data['maxid']=$model->query($sql);
		$data['maxid']=$data['maxid'][0]["count(*)"];
		if($data==NULL){
			echo "error : can not found the problem .";
		}
		else{
		$this->data=$data;
		$this->display();
		}
	}
	public function Submit(){
		$solu=M('solution');
		$pro=M('problem');
		$data['uid']=$_SESSION['uid'];
		$data['pid']=I('pid','','');
		$data['language']=I('language','','');
		$data['result']=0;
		$data['code']=I('code','','');

		$problem=$pro->where('pid='.$data['pid'])->find();
		$problem['submit']+=1;
		$pro->where('pid='.$data['pid'])->save($problem);
		$solu->add($data);
		$this->ajaxReturn(0,'json');
	}
	public function Status(){
		$page=I('page',1); //获取要显示的页面值
		$info=I('info',NULL);
		$num=10; //每页显示数目
		$model=new Model();
		if($info==NULL){
			$sql="select s.soid,s.pid,s.result,s.create_time,s.memory,s.time,s.language,u.username from solution s,user u where s.uid=u.uid  order by soid desc;";
		}
		else{
			$sql="";
		}
		$total=count($model->query($sql));
		$pages=ceil($total/$num);
		$this->pages=$pages;
		$this->nowpage=$page;
		$this->info=$info;
		$offset=($page-1)*$num;
		if($info==NULL){
			$sql="select s.soid,s.pid,s.result,s.create_time,s.memory,s.time,s.language,u.username from solution s,user u where s.uid=u.uid  order by soid desc limit $offset,$num;";
		}
		else{
			$sql="";
		}
		$data=$model->query($sql);
		$this->data=$data;
		$this->display();
	}
	public function Statistic(){
		
	}
	public function RecentNews(){
		$page=I('page',1); //获取要显示的页面值
		$info=I('info',NULL);
		$num=10; //每页显示数目
		$model=new Model();
		if($info==NULL){
			$sql="select u.username,n.title,n.context,n.create_time from news n,admin_user u where n.uid=u.uid and ISNULL(n.cid)  order by n.create_time desc;";
		}
		else{
			$sql="select u.username,n.title,n.context,n.create_time from news n,admin_user u where n.uid=u.uid and ISNULL(n.cid) and n.title like '%".$info."%'  order by n.create_time desc;";
		}
		$total=count($model->query($sql));
		$pages=ceil($total/$num);
		$this->pages=$pages;
		$this->nowpage=$page;
		$this->info=$info;
		$offset=($page-1)*$num;
		if($info==NULL){
			$sql="select u.username,n.title,n.context,n.create_time from news n,admin_user u where n.uid=u.uid and ISNULL(n.cid)  order by n.create_time desc limit $offset,$num;";
		}
		else{
			$sql="select u.username,n.title,n.context,n.create_time from news n,admin_user u where n.uid=u.uid and ISNULL(n.cid) and n.title like '%".$info."%'  order by n.create_time desc limit $offset,$num;";
		}
		$data=$model->query($sql);
		$this->data=$data;
		$this->display();
	}
	public function CreateTeam(){
		$data['name']=I('teamname','','');
		$data['head_id']=I('headid','','');
		$team=M('team');
		$user=M('user');
		$info['tid']=$team->add($data);

		$invite=M('team_invite');
		$invite->where('user_id="'.$data['head_id'].'"')->delete();
		$user->where('uid='.$data['head_id'])->save($info);
		$this->ajaxReturn(0,'json');
	}
	public function AcceptTeam(){
		$data['tid']=I('tid','','');
		$user=M('user');
		$user->where('uid='.I('uid','',''))->save($data);
		$invite=M('team_invite');
		$invite->where('user_id="'.$_SESSION['uid'].'"')->delete();
		$this->ajaxReturn(0,'json');
	}
	public function RemoveMember(){
		$user=M('user');
		$data['tid']=null;
		$user->where('username="'.I('user','','').'"')->save($data);
		$this->ajaxReturn(0,'json');
	}
	public function AddMember(){
		$model=new Model();
		$invite=M('team_invite');
		$data['user_id']=I('user','','');
		$data['team_id']=I('tid','','');
		$sql='select * from user where username="'.$data['user_id'].'"';
		$users=$model->query($sql);
		if(empty($users)==true){
		$this->ajaxReturn(1,'json');
		}
		if($users[0]['tid']!=null){
		$this->ajaxReturn(2,'json');
		}
		$data['user_id']=$users[0]['uid'];
		$invite->add($data);
		$this->ajaxReturn(0,'json');
	}
	public function LeaveTeam(){
		$model=new Model();
		$user=M('user');
		$invite=M('team_invite');
		$team=M('team');
		$data['tid']=null;
		$sql='select * from user where uid='.$_SESSION['uid'];
		$userss=$model->query($sql);
		$sql='select * from team where tid="'.$userss[0]['tid'].'"';
		$teaminfo=$model->query($sql);
		if($teaminfo[0]['head_id']==$_SESSION['uid']){
			$sql='select * from user where tid="'.$userss[0]['tid'].'"';
			$members=$model->query($sql);
			for($i=0;$i<count($members);$i++){
				$user->where('uid="'.$members[$i]['uid'].'"')->save($data);
			}
			$invite->where('team_id="'.$userss[0]['tid'].'"')->delete();
			$team->where('tid="'.$userss[0]['tid'].'"')->delete();
		}

		$user->where('uid='.$_SESSION['uid'])->save($data);
		
		$this->ajaxReturn(0,'json');
		}
	public function CancelInvite(){

		$model=new Model();
		$invite=M('team_invite');
		$sql='select * from user where username="'.I('user','','').'"';
		$user=$model->query($sql);
		$sql='select * from team_invite where team_id="'.I('tid','','').'"';
		$team=$model->query($sql);
		for($i=0;$i<count($team);$i++){
			if($team[$i]['user_id']==$user[0]['uid']){
				$inviteid=$team[$i]['id'];
			}
		}
		$invite->where('id="'.$inviteid.'"')->delete();
		$this->ajaxReturn(0,'json');
	}

	public function ModifyInfo(){	
    	$user=m('user')->where(array('uid' => $_SESSION['uid']))->find();
		if($user["password"]!=I('oldpwd','','md5'))
			$this->ajaxreturn(1,'json');
		$data['password']=I('newpwd','','md5');
		$data['name']=I('name','','');
		$data['note']=I('note','','');
		$data['sex']=I('sex','','');
		$data['major']=I('major','','');
		$data['grade']=I('grade','','');
		$data['class']=I('class','','');
		$data['email']=I('email','','');
		M('user')->where('uid="'.$_SESSION['uid'].'"')->save($data);
		$this->ajaxreturn(0,'json');
	}
}