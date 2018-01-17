<?php
namespace app\admin\controller;

use think\Controller;

class Xiangmu extends Controller
{
//注册接口
	public function zhuce()
	{
		$table=db('member');
		$telphone=input('post.telphone');
		$password=input('post.password');
		$data=[
				'telphone'=>$telphone,
				'password'=>$password,
			    'inputtime'=>date('Y-m-d'),
			 ];
		$info=$table->insert($data);
		if($info){
			return json('succ');}
	    else{
		  return json('fail');
		}
	}

//登录接口
	public function denglu(){
		//return json('1');
			$table=db('member');
			$telphone=input('post.telphone');
			$password=input('post.password');
			$info=$table->where("telphone=".$telphone)->find();
			$sql=$table->getlastSql();
			//return json($sql);
			if($info){ 
				if($info['password']==$password){
					$mesg=[
						'msg'=>'succ',
						'info'=>$info
					];
				}else{
					 $mesg=[
						'msg'=>'fail' 
					];
				}
			}else{
				$mesg=[
						'msg'=>'none' 
					];
			}
			return json($mesg);	
		}

//修改密码接口
		public function uplodpass(){
        $data=input('post.');
        $table=db('member');
        $userid=$data['userid'];
         $lodpass=$data['lodpass'];
        $newpass=$data['newpass'];
        $lodverify=$table->where("id='".$userid."' and password='".$lodpass."'")->find();
        if($lodverify){						//原密码是否存在
        	$data['id']=$userid;
        	$data['password']=$newpass;
        	unset($data['userid']);
        	unset($data['newpass']);
        	unset($data['lodpass']);
        	$info=$table->update($data);
        	if($info){
        		$info2=$table->where('id='.$userid)->find();
        		$info2['info']='succ';
		        unset($info2['qq']);
				
		        return json($info2);
        	}elseif($info===false){
        		$info4['info']='fail';
        		return json($info4);
        	}
        }else{
        	$info3['info']='bucunzai';
        	return json($info3);
        }
    }

//忘记密码
      public function mima()
	{
	   $table=db('member');
		$telphone=input('post.telphone');
		$password=input('post.password');
		$data=[
				'password'=>$password,
			 ];
		$info=$table->where("telphone=".$telphone)->update($data);
		if($telphone!=$info['telphone'])
			{
			return json('error');
			}
			elseif($info)
		      {
			   return json('succ');
			 }
	    else{
		  return json('fail');
		}
	}
	
//顺序答题
	public function timuinfo()
	{
		$tid=input('post.tid')?input('post.tid'):1;
		$flag=input('post.flag');
		if($flag=='next')
		{
			$info=db('problem')->alias('p')->where('p.id>'.$tid)->order('p.id asc')->find();
		}
		else{
			$info=db('problem')->alias('p')->where('p.id='.$tid)->order('p.id asc')->find();
		}
		$info['answer']=db('answer')->where('pid='.$info['id'])->column('answer');
		$info['options']=db('options')->field('linecode as value,content as label')->where('pid='.$info['id'])->select();
		if($info['type']=='1')
		{
			$info['type']='单选';
			$info['numbers']=1;
		}
		if($info['type']=='2')
		{
			$info['type']='多选';
			$info['numbers']=count($info['options']);
		}
		return json($info);
		
	}
//答案存入数据库
	public function timudaan()
	{
		$tid=input('post.tid')?input('post.tid'):1;
		$mid=input('post.userid');
		$cuanswer=input('post.cuanswer');
		$info['answer']=db('answer')->where('pid='.$tid)->column('answer');
		$data=[
		    'mid'=>$mid,	
		    'pid'=>$tid,
            'answer'=>$cuanswer,
			'pubdate'=>date('Y-m-d'),
			];
			$daan=db('dati')->insert($data);
		
		if(!in_array($cuanswer,$info['answer']))
		{
			$dataS=[
		    'mid'=>$mid,
		    'pid'=>$tid,
            'errornums'=>1,
			'pubdate'=>date('Y-m-d'),
			];
			$infos=db('record')->where("mid =".$mid." and pid=".$tid)->find();
			if($infos)
			{
				db('record')->where("mid =".$mid." and pid=".$tid)->setInc('errornums');
			}
			else{
				$daan=db('record')->insert($dataS);
			}
					
		}
		else{
			db('record')->where("mid =".$mid." and pid=".$tid)->setInc('succnums');
			$succnum=db('record')->where("mid =".$mid." and pid=".$tid)->value('succnums');
			if($succnum>=3)
			{
				db('record')->where("mid =".$mid." and pid=".$tid)->delete();
			}
	
		}
		
		$info['answerintro']=db('answer')->where('pid='.$tid)->value('intro'); 
		return json($info);
	}

//随机题目学习
	public function gettimuinfo()
	{
		$tid=input('post.tid')?input('post.tid'):1;
		$flag=input('post.flag');
		if($flag=='next')
		{
			$info=db('problem')->alias('p')->join('answer','answer.pid=p.id')->where('p.id>'.$tid)->order('p.id asc')->find();

		}
		else{
			$info=db('problem')->alias('p')->join('answer','answer.pid=p.id')->where('p.id='.$tid)->order('p.id asc')->find();
		}
		if(!empty($info))
		{
			$info['msg']='nolasts';
			$info['options']=db('options')->field('linecode as value,content as label')->where('pid='.$info['id'])->select();
			$info['answer']=db('answer')->where('pid='.$info['id'])->column('answer');
			if($info['type']=='1')
			{
				$info['type']='单选';
				$info['numbers']=1;
			}
			if($info['type']=='2')
			{
				$info['type']='多选';
				$info['numbers']=count($info['options']);
			}
			
		}else{
			$info['msg']='lasts';
		}

		return json($info);
	}

//错题学习
   public function cuotixuexi()
	{
   $tid=input('post.tid')?input('post.tid'):1;
   $flag=input('post.flag');
   $mid=input('post.userid');
    //echo $mid;exit;
      if($flag=='next')
		{
			$info=db('record')->alias('r')
				->join('problem','r.pid=problem.id')
				->join('answer','r.pid=answer.pid')
				->where('r.pid>'.$tid)
				->field('problem.*,answer.answer,answer.intro,r.pid')
				->order('r.pid asc')->find();
		}
     else{
			$info=db('record')->alias('r')
				->join('problem','r.pid=problem.id')
				->join('answer','r.pid=answer.pid')
				->where('r.pid>'.$tid)
				->field('problem.*,answer.answer,answer.intro,r.pid')
				->order('r.pid asc')->find();
		}
        if(!empty($info))
		{
			$info['msg']='nolasts';
			$info['options']=db('options')->field('linecode as value,content as label')->where('pid='.$info['id'])->select();
			$info['answer']=db('answer')->where('pid='.$info['id'])->column('answer');
			if($info['type']=='1')
			{
				$info['type']='单选';
				$info['numbers']=1;
			}
			if($info['type']=='2')
			{
				$info['type']='多选';
				$info['numbers']=count($info['options']);
			}
			
		}else{
			$info['msg']='lasts';
		}

      return json($info);
    }

//章节学习
	public function zhangjiexuexi()
	{
		$tid=input('post.tid')?input('post.tid'):1;
		$flag=input('post.flag');
		$wid=input('post.wid');
		if($flag=='next')
		{
			$info=db('problem')->alias('p')->join('answer','answer.pid=p.id')->join('subject','subject.id=p.subject_id')->where('p.id>'.$tid.' and subject_id='.$wid)->field('p.*,answer.answer,answer.intro')->order('p.id asc')->find();
		}
		else{
			$info=db('problem')->alias('p')->join('answer','answer.pid=p.id')->join('subject','subject.id=p.subject_id')->where('subject_id='.$wid)->field('p.*,answer.answer,answer.intro')->order('p.id asc')->find();
		}		
		 if(!empty($info))
		{
			$info['msg']='nolasts';
			$info['options']=db('options')->field('linecode as value,content as label')->where('pid='.$info['id'])->select();
			$info['answer']=db('answer')->where('pid='.$info['id'])->column('answer');
			if($info['type']=='1')
			{
				$info['type']='单选';
				$info['numbers']=1;
			}
			if($info['type']=='2')
			{
				$info['type']='多选';
				$info['numbers']=count($info['options']);
			}
			
		}else{
			$info['msg']='lasts';
		}	
		return json($info);	
	}
	public function zhangjie()
		{		
			$table=db('subject');
			$list=$table->select();
			$data['options']=$list;
			return json($data);	
		}
//目标设定学习
	public function kemu()
    {
        $sublist=db('subject')->column('subname');
        return json($sublist);
    }
//成绩查询
	public function chengji()
	{
		$info=db('tests')->alias('t')->join('score','score.tid=t.id')->select();
		foreach ($info as &$v)
		{
			$v['pubdate']=date('Y-m-d',$v['pubdate']);
		}
		return json($info);
	}

//错题记录
	public function cuotijilu()
	{
		$mid=input('post.userid');
		$mid=11;
		$info=db('record')->alias('s')->join('problem','problem.id=s.pid')->where('mid='.$mid)->field('problem.*')->select();
		//$info=db('problem')->select();
		return json($info);
	}
 
//目标设定
/*	public function mubiaosheding(){
		$sujbectname=input('post.subname')
		$num=input('post.num');
		$db=db('problem');
		$info=$db->join('subject','problem.subject_id=subject.id')
		->where('subject.subname='.$subname)->select();
		return json($info);
	}
	*/

//错题记录的错题查看
	public function cuoti(){

		$id=input('post.nid');
		$list=db('record')->alias('a')->join('problem','a.pid=problem.id')->join('options','options.pid=problem.id')->join('answer','answer.pid=problem.id')->field('problem.title,problem.type,answer.intro,answer.answer,problem.id')->where("a.pid=$id and problem.id=options.pid")->find();
		$list['options']=db('options')->field('linecode as value,content as label')->where('pid='.$list['id'])->select();
		if($list['type']=='1'){
				$list['type']='单选';
			    $list['numbers']=1;
			}
		if($list['type']=='2'){
				$list['type']='多选';
			    $list['numbers']=count($list['options']);
			}
		return json($list);
	}
//随机题目
	 public function suiji()
		{
		  $flag=input('post.flag');
		  $kk=input('post.kk');	
		 if($kk==1)
			{
          $arr=db('problem')->column('id');
	      $newarr='';
		  for($i=0;$i<50;$i++)
			{
		    $j=rand(0,count($arr));
		    $newarr.=$j.",";
			}
			$newarr=substr($newarr,0,1);			
		   $tid=$newarr; 
            $data=[
		   'tids'=>$tid,  
	       ]
		   $info=db('suiji')->insert($data);     
			}
			else{
				
			}    
		}

//成绩
  public function grade()
	{
        $table=db('dati');
		$mid=input('post.userid');
     }
}?>