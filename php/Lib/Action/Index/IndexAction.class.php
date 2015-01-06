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
		$data['password']=I('password','','md5');
		$data['email']=I('email','','');
		$user=M('user');
		$user->add($data);
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
			$this->error("");
		}
		$model=new Model();
		$sql='select count(*) from oj.problem';
		$total=$model->query($sql);
		$sql='select * from user where uid='.$user;
		$info=$model->query($sql);
		$this->info=$info;
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
}