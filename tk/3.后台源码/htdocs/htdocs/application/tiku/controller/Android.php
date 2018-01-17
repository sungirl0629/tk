<?php
namespace app\tiku\controller;

use think\Controller;

class Android extends Controller
{
	public function index()
	{
		$db=db('student');
		$list=$db->select();
		$arr=[
		'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1498107512326&di=8e71e9a4f94a10d695700668e93f68dd&imgtype=0&src=http%3A%2F%2Fimg5q.duitang.com%2Fuploads%2Fitem%2F201407%2F30%2F20140730005118_kcCyw.thumb.700_0.jpeg',
		'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1498107512324&di=fa77f2ace0ab4962e6b23bbf089c2c43&imgtype=0&src=http%3A%2F%2Fimg4.duitang.com%2Fuploads%2Fitem%2F201508%2F22%2F20150822201401_jZwEY.jpeg',
		'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1498107512324&di=20c54d17b56f7c95c1b1e2dce3f8c4ff&imgtype=0&src=http%3A%2F%2Fimg4q.duitang.com%2Fuploads%2Fitem%2F201409%2F30%2F20140930233607_mXYik.jpeg',
		'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1498107512324&di=7e7b529a8343f011f6884481bd10e860&imgtype=0&src=http%3A%2F%2Fwww.wed114.cn%2Fbaike%2Fuploads%2Fallimg%2F160817%2F27-160QG53537.jpg',
		];
		//echo rand(0,4);exit;
		foreach($list as &$v)
		{
			$v['photo']=$arr[rand(0,3)];
		}
		return json($list);
	}
	
}

?>