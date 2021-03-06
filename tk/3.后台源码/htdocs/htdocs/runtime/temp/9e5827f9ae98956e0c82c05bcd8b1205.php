<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/xuanxianglist.html";i:1501808878;}*/ ?>
<!doctype html>
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
                        选项列表
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
                                    <a href="<?php echo url('Index/neironglist'); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>新增</a>
                                    
                                    <button id="delete_rule_all" type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </div>                      
          </span>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-check"><input type="checkbox" id="check_rule_all"  class="tpl-table-fz-check"></th>
                                            <th class="table-id">ID</th>
                                            <th class="table-id">选项</th>
                                            <th class="table-title">内容</th>
                                            <th class="table-id">pid</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($xxlist) || $xxlist instanceof \think\Collection || $xxlist instanceof \think\Paginator): if( count($xxlist)==0 ) : echo "" ;else: foreach($xxlist as $key=>$xxl): ?>
                                        
                                        <tr>
                                            <td><input type="checkbox" class="ids" value="{xxl.id}"></td>
                                            <td><?php echo $xxl['id']; ?></td>
                                            <td><?php echo $xxl['linecode']; ?></td>
                                            <td><?php echo $xxl['content']; ?></td>
                                            <td><?php echo $xxl['pid']; ?></td>
                                           
                                            
                                            <td>
                                                <div class="am-btn-toolbar">
                                                     <div class="am-btn-group am-btn-group-xs">
                                            <a href="<?php echo url('Index/upxuanxiang',['id'=>$xxl['id']]); ?>"  class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                            <a href="<?php echo url('Index/delxxlist',['id'=>$xxl['id']]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
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

        window.location.href="/index.php/tiku/Index/delxxlist/id/"+idds;
    });
</script>
</body>
</html>