<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/addgroup.html";i:1501664234;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/head.html";i:1501569306;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        用户组列表添加
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
                <form method="post" action="<?php echo url('Index/do_addgroup'); ?>" class="am-form am-form-horizontal">

                                <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">规则中文名称 / ZhName</label>
                        <div class="am-u-sm-9">
                            <input type="text" id="group_zh_name"  name="title" placeholder="规则中文名称 / Name">

                            <small id="showzhmsg"></small>
                        </div> 
                                <div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">状态</label>
                                    <div class="am-u-sm-9">
                                        <input type="radio" checked="checked"  name="status" value='1'><small>启用</small>
                                        <input type="radio" name="status" value='0'><small>禁用</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary">保存</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
	<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>
	<script type="text/javascript">
    $('#group_zh_name').blur(function(){
        var zhname=$(this).val();
        if(zhname=='')
        {
            $('#showzhmsg').html('中文名称不可为空');
            $('#showzhmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        $.ajax({
            url:"<?php echo url('Index/checkzkname'); ?>",
            type:"post",
            data:{names:zhname},
            success:function(data){
                $('#showzhmsg').html(data.msg);
                if(data.status)
                {
                    $('#showzhmsg').css('color','red');
                    $('.am-btn-primary').attr('disabled',true);
                }
                else
                {
                    $('#showzhmsg').css('color','green');
                    $('.am-btn-primary').attr('disabled',false);
                }
            }
            
        });
    });
</script>
</body>
