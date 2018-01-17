<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/timulist.html";i:1501671450;}*/ ?>
<!doctype html>
<!-- 题目显示 -->
<html>
<head>
    <link rel="stylesheet" href="__STATIC__/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__/assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/app.css">
    <script src="__STATIC__/assets/js/echarts.min.js"></script>
</head>
<body> 
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        题目列表
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                                <i class="am-icon-search"></i>
                                <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
                        </div>
                    </div>
                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="<?php echo url('Index/addtimu'); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>新增</a>
                                    <button id="delete_rule_all" type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm'}">
              <option value="option1">所有类别</option>

            </select>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-3">
                            <div class="am-input-group am-input-group-sm">
                                <input type="text" class="am-form-field">
                                <span class="am-input-group-btn">
            <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search" type="button"></button>
          </span>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-check"><input type="checkbox" id="check_rule_all" class="tpl-table-fz-check"></th>
                                            <th class="table-id">ID</th>
                                            <th class="table-title">题目</th>
											<th class="table-date am-hide-sm-only">题目分数</th>
											<th class="table-author am-hide-sm-only">题目类型</th>
                                            <th class="">图片</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if(is_array($uselist) || $uselist instanceof \think\Collection || $uselist instanceof \think\Paginator): if( count($uselist)==0 ) : echo "" ;else: foreach($uselist as $key=>$ulist): ?>
                                        <tr>
                                            <td><input type="checkbox" class="ids" value="<?php echo $ulist['id']; ?>"></td>
                                            <td><?php echo $ulist['id']; ?></td>
                                            <td><a href="#"><?php echo $ulist['title']; ?></a></td>
											 <td><a href="#"><?php echo $ulist['subject_score']; ?></a></td>
											<td class="am-hide-sm-only">
											<?php if($ulist['type'] == 1): ?>单选题<?php endif; if($ulist['type'] == 2): ?>多选题<?php endif; if($ulist['type'] == 3): ?>填空题<?php endif; if($ulist['type'] == 4): ?>解答题<?php endif; ?>
											
											</td>
                                            <td ><img src="/Uploads/<?php echo $ulist['photo']; ?>" alt="" height="40px" width="50px" /></td>
                                            
											</td>
											
											<td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
<a href="<?php echo url('Index/uptimu',['id'=>$ulist['id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                                        <a href="<?php echo url('Index/deproblem',['id'=>$ulist['id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
                                        
                                    </tbody>
                                </table>
                                <div class="am-cf">
                                    <div class="am-fr">
                                        <?php echo $page; ?>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
    <script src="__STATIC__/assets/js/jquery.min.js"></script>
    <script src="__STATIC__/assets/js/amazeui.min.js"></script>
    <script src="__STATIC__/assets/js/app.js"></script>
<script type="text/javascript">
    $('#check_rule_all').click(function(){
        if($(this).is(':checked'))
        {
            $('.ids').prop('checked',true);
        }
        else
        {
            $('.ids').prop('checked',false);
        }

    });
    $('#delete_rule_all').click(function(){
        var idds='';
        $('.ids').each(function(){
            if($(this).is(':checked'))
            {
                idds+=$(this).val()+',';
            }
        });
        idds=idds.substr(0,idds.length-1);

        window.location.href="/index.php/tiku/Index/deproblem/id/"+idds;
    });
</script>
</body>
</html>