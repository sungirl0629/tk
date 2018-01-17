<?php
namespace app\tiku\controller;

use think\Controller;

class Login extends Controller
{
	public function index()
	{
		//echo md5('22222');exit;
		if(session('userid')!='')
		{
			$this->redirect('Index/index');
		}
		return $this->fetch();
	}
	public function do_login()
	{
		$username=input('post.username');
		$password=input('post.password');
		$table=db('user');
		$info=$table->where('username="'.$username.'"')->find();
		//echo "<pre>";
		//print_r($info);
		if($info)
		{
			if($info['password']==$password)
			{
				session('userid',$info['id']);
				session('username',$username);
				$this->success('登录成功','Index/index');
			}
			else{
				$this->error('密码错误,登录失败');
			}
		}
		else{
			$this->error('登录失败，用户名不存在');
		}
	}
}

?>