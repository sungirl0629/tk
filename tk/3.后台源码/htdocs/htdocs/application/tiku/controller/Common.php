<?php
namespace app\tiku\controller;

use think\Controller;
use think\Auth;

class Common extends Controller
{
	public function _initialize()
	{
		parent::_initialize();
		if(session('userid')=='')
		{
			$this->redirect('Login/index');
		}
		else{
				$auth=new Auth();
				$controller=request()->controller();
				$action=request()->action();
				$info=$auth->check($controller,session('userid'));
				if($info){
					$info2=$auth->check($controller."/".$action,session('userid'));
					if(!$info2){
						//dump('No Access');exit;
					}
				}else{
					//dump('No Access');exit;
				}
			}
	}
}
?>