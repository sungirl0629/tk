<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/record_list.html";i:1501850632;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="__STATIC__assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__assets/css/app.css">
</head>
<body>

<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
            错题记录列表
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
                        <button id="piliangDel" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
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
                            <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"  id="checkall"></th>
                            <th class="table-title">用户id</th>
                            <th class="table-title">题目名称</th>
                            <th class="table-title">时间</th>
                            <th class="table-title">答对次数</th>
                            <th class="table-title">打错次数</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($name) || $name instanceof \think\Collection || $name instanceof \think\Paginator): if( count($name)==0 ) : echo "" ;else: foreach($name as $key=>$info): ?>
                        <tr>
                            <td><input class="listcheck" value="<?php echo $info['id']; ?>" type="checkbox"></td>
                            <td><?php echo $info['mid']; ?></td>
                            <td><?php echo $info['title']; ?></td>
                            <td><?php echo $info['pubdate']; ?></td>
                            <td><?php echo $info['succnums']; ?></td>
                            <td><?php echo $info['errornums']; ?></td>

                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                        <a href="<?php echo url('Index/record_deluser',['id'=>$info['id']]); ?>" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</a>
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










</div>

</div>


<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>
<script type="text/javascript">
    //全选按钮
    $('#checkall').click(function(){
        if($(this).is(':checked')){
            $('.listcheck').prop('checked',true);
        }
        else
        {
            $('.listcheck').prop('checked',false);
        }

    });
    //批量删除
    $('#piliangDel').click(function(){
        var delid='';
        $('.listcheck').each(function(){
            if($(this).is(':checked'))
            {
                delid+=$(this).val()+',';
            }
        });
        delid=delid.substr(0,delid.length-1);

        window.location.href="/index.php/admin/Index/record_deluser/id/"+delid;
    });

</script>
</body>

</html>