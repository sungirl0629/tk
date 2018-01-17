<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/5/31
 * Time: 20:20
 */
namespace app\tiku\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $table=db('user');
        $userinfo=$table->find();
        $this->assign('userinfo',$userinfo);
        return $this->fetch();
    }
//退出
	    public function session_del(){
        session_unset();
            $this->success('退出成功','Login/index');
    }
//会员列表
    public function userlist(){
       $db=db('member');
		$list=$db->paginate(config('paginate.list_rows'));
		$this->assign('name',$list);
		$this->assign('page',$list->render());
		return $this->fetch();
    }
//会员删除
	public function deluser(){
		$id=input('id');
		$db=db('member');
		$list=$db->where('Id='.$id)->delete();
		if($list){
			$this->success('succ','Index/userlist');
		}else{
			$this->error('fail');
		}
	}
//添加会员
	public function adduser(){
		$db=db('member');
		$list=$db->select();
		$this->assign('list',$list);
		return $this->fetch();
	}
//处理添加会员
	public function do_adduser(){
		$data=input('post.');
		$fail=request()->file('photo');
		$failinto=$fail->move(config('upload_path'));
		$data['photo']=$failinto->getSavename();
		$data['inputtime']=date('Y-m-d',time());
		$db=db('member');
		if($data['username']==''){
			$this->error('用户名不能为空','Index/adduser');
		}
		$list=$db->insert($data);
		if($list){
			$this->success('succ','Index/userlist');
		}else{
			$this->error('fail','Index/userlist');
		}
	}
//修改会员
	public function upuser()
	{	
		$id=input('id');
		$info=db('member')->where('id='.$id)->find();
		$this->assign('list',$info);
		return $this->fetch();
	}
//修改处理会员
	public function do_upuser()
	{
		$data=input('post.');
		$id=input('id');
		$file=request()->file('photo');
		if($file)
		{
		$fileinfo=$file->move(config('upload_path'));
		$data['photo']=$fileinfo->getSavename();	
		}
		$table=db('member');
		$info=$table->where('id='.$id)->update($data);
		if($info!==false)
		{
			$this->success('修改成功','Index/userlist');
		}else{
			$this->success('修改失败');
		}
	}
	public function checkname(){
		$name=input('post.names');
		$db=db('member');
		$info=$db->where("username='".$name."'")->find();
		if($info){
			$adata=[
				'status'=>1,
				'msg'=>'名字不可用',
			];
		}else{
			$adata=[
				'status'=>0,
				'msg'=>'名字可用',
			];
		}
		return json($adata);
	}
//选项列表
	public function xuanxianglist()
	{
		$db=db('options');
        $list=$db->paginate(config('paginate.list_rows'));
        $this->assign('xxlist',$list);
        $this->assign('page',$list->render());
        return $this->fetch();
	}
//删除选项
    public function delxxlist(){
        $id=input('id');
        $db=db('options');
        $list=$db->where('id in ('.$id.')')->delete();
        if($list){
            $this->success('succ','Index/xuanxianglist');
        }else{
            $this->error('fail');
        }
    }
//修改选项
    public function upxuanxiang(){
        $id=input('id');
        $db=db('options');
        $list=$db->where('id='.$id)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function do_upxuanxiang(){
		$id=input('id');
        $data=input('post.');
        $db=db('options');
        $list=$db->where('id='.$id)->update($data);
        if($list){
            $this->success('succ','Index/xuanxianglist');
        }elseif($list===false){
            $this->error('fail');
        }else{
            $this->success('未改变','Index/xuanxianglist');
        }
    }
//添加选项
    public function neironglist(){
        $db=db('options');
        $list=$db->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function do_neironglist(){
        $data=input('post.');
        $db=db('options');
        if($data['pid']==''){
            $this->error('题目名不能为空','Index/sub_adduser');
        }
        $list=$db->insert($data);
        if($list){
            $this->success('succ','Index/neironglist');
        }else{
            $this->error('fail','Index/neironglist');
        }
    }
//科目列表
    public function sub_userlist(){
        $db=db('subject');
        $list=$db->paginate(config('paginate.list_rows'));
        $this->assign('ylp',$list);
        $this->assign('page',$list->render());
        return $this->fetch();
    }
//删除科目
    public function sub_deluser(){
        $id=input('id');
        $db=db('subject');
        $list=$db->where('id in ('.$id.')')->delete();
        if($list){
            $this->success('succ','Index/sub_userlist');
        }else{
            $this->error('fail');
        }
    }
//添加科目
    public function sub_adduser(){
        $db=db('subject');
        $list=$db->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function sub_do_adduser(){
        $data=input('post.');
        $db=db('subject');
        if($data['subname']==''){
            $this->error('用户名不能为空','Index/sub_adduser');
        }
        $list=$db->insert($data);
        if($list){
            $this->success('succ','Index/sub_userlist');
        }else{
            $this->error('fail','Index/sub_userlist');
        }
    }
//修改科目
    public function sub_upuser(){
        $id=input('id');
        $db=db('subject');
        $list=$db->where('id='.$id)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function sub_do_upuser(){
		 $id=input('id');
        $data=input('post.');
        $db=db('subject');
        $list=$db->where('id='.$id)->update($data);
        if($list){
            $this->success('succ','Index/sub_userlist');
        }elseif($list===false){
            $this->error('fail');
        }else{
            $this->success('未改变','Index/sub_userlist');
        }
    }
//用户组列表
	public function grouplist()
	{	
		$db=db('auth_group');
		$rulelist=$db->paginate(config('paginate.list_rows'));
		$this->assign('ergou',$rulelist->toArray());
		$this->assign('page',$rulelist->render());
		return $this->fetch();
	}
	public function addgroup()
	{
		return $this->fetch();
	}
	public function do_addgroup()
	{
		$db=db('auth_group');
		$data=input('post.');
		$info=$db->insert($data);
		if($info)
		{
			$this->success('添加成功','Index/grouplist');
		}else{
			$this->error('添加失败');
		}
	}
//检查用户组名称是否存在
    public function checkzkname()
	{
		$name=input('post.names');
		$db=db('auth_group');
		$info=$db->where("title='".$name."'")->find();
		if($info)
		{
			$data=[
			'status'=>1,
			'msg'=>'此用户组已存在'
		];
		}else{
			$data=[
			'status'=>0,
			'msg'=>'此用户组可用'
		];
	    }
		return json($data);
	}
//用户组删除
	public function delgroup()
	{	
		$id=input('id');
		$db=db('auth_group');
		$info=$db->where('id in ('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/grouplist');
		}else{
			$this->error('删除失败');
		}
	}
//用户组修改
	public function upgroup()
	{	
		$id=input('id');
		$db=db('auth_group');
		$info=$db->where('id='.$id)->find();
		$this->assign('info',$info);
		return $this->fetch();
	}
	public function do_upgroup()	
	{	
		$id=input('id');
		$db=db('auth_group');
		$data=input('post.');
		$info=$db->where('id='.$id)->update($data);
		if($info!==false)
		{
			$this->success('修改成功','Index/grouplist');
		}else{
			$this->error('修改失败');
		}
	}
//规则列表
	public function rulelist()
	{	
		$db=db('auth_rule');
		$rulelist=$db->paginate(config('paginate.list_rows'));
		$this->assign('ergou',$rulelist->toArray());
		$this->assign('page',$rulelist->render());
		return $this->fetch();
	}
//规则列表添加
	public function addrule()
	{	
		$table=db('auth_rule');
		$rulelist=$table->select();
		foreach($rulelist as &$v){
            $v['second']=$table->select();
        }
		$this->assign('rulelist',$rulelist);
		return $this->fetch();
	}
	public function do_addrule()
	{
		$db=db('auth_rule');
		$data=input('post.');
		$info=$db->insert($data);
		if($info)
		{
			$this->success('添加成功','Index/rulelist');
		}else{
			$this->error('添加失败');
		}
	}
//检查规则名称是否存在
	public function checkenname()
	{
		$name=input('post.names');
		$db=db('auth_rule');
		$info=$db->where("name='".$name."'")->find();
		if($info)
		{
			$data=[
			'status'=>1,
			'msg'=>'此英文已存在'
		];
		}else{
			$data=[
			'status'=>0,
			'msg'=>'此英文可用'
		];
	    }
		return json($data);
	}
	public function checkzhname()
	{
		$name=input('post.names');
		$db=db('auth_rule');
		$info=$db->where("title='".$name."'")->find();
		if($info)
		{
			$data=[
			'status'=>1,
			'msg'=>'此中文已存在'
		];
		}else{
			$data=[
			'status'=>0,
			'msg'=>'此中文可用'
		];
	    }
		return json($data);
	}
//规则列表删除
	public function delrule()
	{	
		$id=input('id');
		$db=db('auth_rule');
		$info=$db->where('id in ('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/rulelist');
		}else{
			$this->error('删除失败');
		}
	}
//规则列表修改
	public function uprule()
	{	
		$id=input('id');
		$db=db('auth_rule');
		$info=$db->where('id='.$id)->find();
		$this->assign('info',$info);
		return $this->fetch();
	}
	public function do_uprule()	
	{	
		$id=input('id');
		$db=db('auth_rule');
		$data=input('post.');
		$info=$db->where('id='.$id)->update($data);
		if($info!==false)
		{
			$this->success('修改成功','Index/rulelist');
		}else{
			$this->error('修改失败');
		}
	}
//答案列表
	public function answerlist()
	{
		$db=db('answer');
		$answerlist=$db->paginate(config('paginate.list_rows'));
		$this->assign('page',$answerlist->render());
		$this->assign('answerlist',$answerlist);
		return $this->fetch();
	}
//答案添加
		public function addanswer()
	{
		$db=db('auth_group');
		$grouplist=$db->select();
		$this->assign('grouplist',$grouplist);		
		return $this->fetch();
	}
	public function do_addanswer()
	{	
		$data=db('answer');
		$table=input('post.');
		$info=$data->insert($table);
		if($info)
		{
			$this->success('添加成功','Index/answerlist');
		}
		else{
			$this->error('添加失败');
		}
	}
//答案删除
	public function delanswer()
	{
		$id=input('id');
		$db=db('answer');
		$info=$db->where('id in('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/answerlist');
		}
		else{
			$this->error('删除失败');
		}
	}
//答案修改
	public function upanswer()
	{
		$id=input('id');
		$data=db('answer');
		$info=$data->where('id in('.$id.')')->find();
		$this->assign('info',$info);
		return $this->fetch();
	}
	public function do_upanswer()
	{
		$data=input('post.');
		$table=db('answer');
		$info=$table->update($data);
		if($info!==false)
		{
			$this->success('修改成功','Index/answerlist');
		}else{
			$this->error('修改失败');
		}
		return $this->fetch();
	}
//成绩表
   public function sc_userlist()
    {
        $db=db('score');
        $list=$db->alias('a')
            ->join('member','a.mid=member.id')
            ->join('subject','a.sub_id=subject.id')
            ->select();
        $info=$db->paginate(config('paginate.list_rows'));
        $this->assign('name',$info);
        $this->assign('page',$info->render());
        return $this->fetch();
    }
//成绩添加
		public function addscore()
	{
		$db=db('score');
		$grouplist=$db->select();
		$this->assign('grouplist',$grouplist);		
		return $this->fetch();
	}
	public function do_addscore()
	{	
		$data=db('score');
		$table=input('post.');
		$info=$data->insert($table);
		if($info)
		{
			$this->success('添加成功','Index/sc_userlist');
		}
		else{
			$this->error('添加失败');
		}
	}
//成绩删除
	public function delscore()
	{
		$id=input('id');
		$db=db('score');
		$info=$db->where('id in('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/sc_userlist');
		}
		else{
			$this->error('删除失败');
		}
	}
//成绩修改
	public function upscore()
	{
		$id=input('id');
		$data=db('score');
		$info=$data->where('id in('.$id.')')->find();
		$this->assign('info',$info);
		return $this->fetch();
	}
	public function do_upscore()
	{
		$data=input('post.');
		$table=db('score');
		$info=$table->update($data);
		if($info!==false)
		{
			$this->success('修改成功','Index/sc_userlist');
		}else{
			$this->error('修改失败');
		}
		return $this->fetch();
	}
//题目添加
	public function addtimu()  
	{
		$db=db('subject');
		$grouplist=$db->select();
		$this->assign('grouplist',$grouplist);
		return $this->fetch();
	}
//处理题目添加
	public function do_addtimu()  
	{
		$data=input('post.');
		$file=request()->file('photo'); //接受图片的名字
        if($_FILES['photo']['name']!='')
        {
            $fileinfo=$file->move(config('upload_path')); //创建放图片的文件夹 得到存的信息
            $data['photo']=$fileinfo->getSavename();//求图像返回路径和名称
        }
		if($file){	
			$files=$file->move(PUBLIC_PATH.'Uploads/');
			$data['photo']=$files->getSavename();
		}
		$table=db('problem');
		$info=$table->insert($data);
		if($info)
		{
			return $this->success('添加成功','Index/timulist');
		}
		else{
			return $this->error('添加失败');
		}
	}
//题目列表
	public function timulist()
	{
		$db=db('problem');
		$uselist=$db->paginate(config('paginate.list_rows'));
		$this->assign('page',$uselist->render());
		$this->assign('uselist',$uselist);
		return $this->fetch();
	}
//删除题目的方法
	public function deproblem()  
	{
		$stu=db('problem');
		$id=input('id');
		$info=$stu->where('id in ('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/timulist');
		}else{
			$this->error('删除失败');
		}
	} 
// 修改题目
	public function uptimu() 
	{
		$id=input('id');//显示内容
		$info=db('problem')->where('id='.$id)->find();
		//echo "<pre>";
		//print_r($info);
		$this->assign('info',$info);
		$db=db('subject');  //显示科目
		$grouplist=$db->select();
		//print_r($grouplist);
		$this->assign('grouplist',$grouplist);
		return $this->fetch();
	}
//处理题目修改
	public function do_timu()   
	{
		$data=input('post.');
		$id=$data['uid'];
		unset($data['uid']);
		$file=request()->file('photo');
		if($_FILES['photo']['error']==0)
		{
			$fileinfo=$file->move(config('upload_path'));
			$data['photo']=$fileinfo->getSavename();
		}
		$info=db('problem')->where('id='.$id)->update($data);
		if($info)
		{
			return $this->success('修改成功','Index/timulist');
		}else{
			return "修改失败";
		}
	}
//试题列表
	public function textslist()
	{
		$db=db('tests');
		$uselist=$db->paginate(config('paginate.list_rows'));
		$this->assign('page',$uselist->render());
		$this->assign('ergou',$uselist);
		return $this->fetch();
	}
//试题列表删除
	public function deltests()  
	{
		$stu=db('tests');
		$id=input('id');
		$info=$stu->where('id in ('.$id.')')->delete();
		if($info)
		{
			$this->success('删除成功','Index/textslist');
		}else{
			$this->error('删除失败');
		}
	}
//试题列表添加
	public function addtests() 
	{
		$db=db('subject');
		$grouplist=$db->select();
		$this->assign('grouplist',$grouplist);
		$db2=db('problem');
		$grouplist=$db2->select();
		$this->assign('list',$grouplist);
		return $this->fetch();
		return $this->fetch();
	}
	public function do_addtests() 
	{
		$data=input('post.');
		$table=db('tests');
		$info=$table->insert($data);
		if($info)
		{
			return $this->success('添加成功','Index/textslist');
		}
		else{
			return $this->error('添加失败');
		}
	}
//试题列表修改
	public function uptests()  
	{
		$id=input('id');
		$info=db('tests')->where('id='.$id)->find();
		$this->assign('info',$info);
		$db=db('subject'); 
		$grouplist=$db->select();
		$this->assign('grouplist',$grouplist);
		$db2=db('subject'); 
		$list=$db2->select();
		$this->assign('list',$list);
		return $this->fetch();
		return $this->fetch();
	}
	public function do_uptests()  
	{	
			
		$data=input('post.');
		$id=input('id');
		$info2=db('tests')->where('id='.$id)->update($data);
		if($info2)
		{
			return $this->success('修改成功','Index/textslist');
		}else{
			return "修改失败";
		}
	}
//错题记录表
	public function record_list(){
        $db=db('record');
        $dbs=$db
            ->alias('a')
            ->join('member','a.mid = member.id')
            ->join('problem','a.pid = problem.id')
            ->paginate(config('paginate.list_rows'));
        $this->assign('name',$dbs);
        $this->assign('page',$dbs->render());
        return $this->fetch();
    }
//错题记录表删除
    public function record_deluser(){
        $id=input('id');
        $db=db('record');
        $list=$db->where('id in ('.$id.')')->delete();
        if($list){
            $this->success('succ','Index/record_list');
        }else{
            $this->error('fail');
        }
    }
//选项列表
	public function optionslist()
	{
		$db=db('options');
		$uselist=$db->paginate(config('paginate.list_rows'));
		$this->assign('page',$uselist->render());
		$this->assign('uselist',$uselist);
		return $this->fetch();
	}
//答题列表
	public function chengjichaxun()
	{
		$table=db('dati');
		$list = $table->paginate(config('paginate.list_rows'));
		$this->assign('name',$list);
		$this->assign('page', $list->render());
		return $this->fetch();
	}
//答题列表添加
	public function addchengjichaxun()
	{
		$db=db('dati');
		$list=$db->select();
		$this->assign('list',$list);
		return $this->fetch();
	}
	public function do_addchengjichaxun()
	{
		$data = input('post.');
		$db=db('dati');
		$list = $db->insert($data);
		if ($list) {
			$this->success('保存成功');
		} else {
			$this->error('保存失败');
		}
	}
//答题列表修改
	 public function upanswer1(){
        $id=input('id');
        $db=db('answer');
        $list=$db->where('id='.$id)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function do_upanswer1(){
		 $id=input('id');
        $data=input('post.');
        $db=db('answer');
        $list=$db->where('id='.$id)->update($data);
        if($list){
            $this->success('succ','Index/answerlist');
        }elseif($list===false){
            $this->error('fail');
        }else{
            $this->success('未改变','Index/answerlist');
        }
    }
	public function upchengjichaxun(){
        $id=input('id');
        $db=db('dati');
        $list=$db->where('id='.$id)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }
	public function do_upchengjichaxun(){
		 $id=input('id');
        $data=input('post.');
        $db=db('dati');
        $list=$db->where('id='.$id)->update($data);
        if($list){
            $this->success('succ','Index/chengjichaxun');
        }elseif($list===false){
            $this->error('fail');
        }else{
            $this->success('未改变','Index/chengjichaxun');
        }
    }
//答题列表删除
	public function delchengjichaxun()
	{
		$id=input('id');
		$db=db('dati');
		$list=$db->where('id in ('.$id.')')->delete();
		if($list){
			$this->success('succ');
		}else{
			$this->error('fail');
		}
	}
//设置表
	public function shezhibiao()
	{
		$db=db('user');
		$uselist=$db->paginate(config('paginate.list_rows'));
		$this->assign('page',$uselist->render());
		$this->assign('uselist',$uselist);
		return $this->fetch();
	}
//修改密码
   	public function shezhi()
   	{
   		 $table=db('user');
        $userinfo=$table->find();
        $this->assign('userinfo',$userinfo);
        return $this->fetch();
   	}
//处理修改密码
   	public function upshezhi()
   	{
   		$data=input('post.');
		$id=input('id');
		$table=db('user')->where('id='.$id)->find();
		// echo "<pre>";
		// print_r($data['newpassword']);exit;
		if($data['password']=='')
		{
			$this->error('密码不能为空','shezhi');
		}	
		if($table['password']!=$data['password'])
		{
			$this->error('原密码不对','shezhi');
		}
		if($data['newpassword']!=$data['newspassword'])
		{
			$this->error('两次密码不一致','shezhi');
		}
		unset($data['password']);
		unset($data['newspassword']);
		$data['password']=$data['newpassword'];
		unset($data['newpassword']);
		$info=db('user')->where('id='.$id)->update($data);
		if($info!==false)
		{
			$this->success('修改成功,下次登录请使用新密码','shezhi');
		}else{
			$this->success('修改失败');
		}
	}
}
?>