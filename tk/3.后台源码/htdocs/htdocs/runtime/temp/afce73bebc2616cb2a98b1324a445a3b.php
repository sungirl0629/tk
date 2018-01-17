<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/upxuanxiang.html";i:1501668213;}*/ ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__STATIC__/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="__STATIC__/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__STATIC__/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__/assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/app.css">
</head>
<body data-type="generalComponents">
<div class="tpl-portlet-components">
    <div class="portlet-title">
        <div class="caption font-green bold">
           选项添加
        </div>
        <div class="tpl-portlet-input tpl-fz-ml">
            <div class="portlet-input input-small input-inline">
                <div class="input-icon right">
                    <i class="am-icon-search"></i>
                    <input type="text" class="form-control form-control-solid" placeholder="搜索..."> </div>
            </div>
        </div>
    </div>
    <div class="tpl-block ">
        <div class="am-g tpl-amazeui-form">
            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" action="<?php echo url('index/do_upxuanxiang'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $list['id']; ?>" name="id">
                     <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">选项 / linecode</label>
                        <div class="am-u-sm-9">
                            <input type="text" value="<?php echo $list['linecode']; ?>" name="linecode" id="rule_sub_name" placeholder="选项 / linecode">
              <small id="showsubmsg"></small>
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">内容 / content</label>
                        <div class="am-u-sm-9">
                            <input type="text" value="<?php echo $list['content']; ?>" name="content" id="user-name" placeholder="内容 / content">
                        </div>
                         <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">题号 / pid</label>
                        <div class="am-u-sm-9">
                            <input type="text" value="<?php echo $list['pid']; ?>" name="pid" id="user-name" placeholder="题号 / pid">
                        </div>
                    </div>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



</div>
<script type="text/javascript">

    $('#rule_sub_name').blur(function(){
        var zhname=$(this).val();
        if(zhname=='')
        {
            $('#showsubmsg').html('科目名不可为空');
            $('#showsubmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        $.ajax({
            url:"<?php echo url('Index/checksubname'); ?>",
            type:"post",
            data:{names:zhname},
            success:function(data){
                $('#showsubmsg').html(data.msg);
                if(data.status)
                {
                    $('#showsubmsg').css('color','red');
                    $('.am-btn-primary').attr('disabled',true);
                }
                else
                {
                    $('#showsubmsg').css('color','green');
                    $('.am-btn-primary').attr('disabled',false);
                }
            }
            
        });
    });
</script>

</body>

</html>