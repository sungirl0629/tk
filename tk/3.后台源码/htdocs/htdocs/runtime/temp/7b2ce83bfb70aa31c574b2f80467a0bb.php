<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/shezhi.html";i:1501664517;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/head.html";i:1501569306;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
<body>
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
			用户修改密码
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
                <form class="am-form am-form-horizontal" action="<?php echo url('index/upshezhi'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $userinfo['id']; ?>" name="id">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">原密码 /Password</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="password" id="user-name" placeholder="请输入原密码" value="">
                            
                        </div>
                    </div>


                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">新密码 /Password</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="newpassword" id="user-name" placeholder="请输入新密码" value="">
                            
                        </div>
                    </div>



                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">确认密码 /Password</label>
                        <div class="am-u-sm-9">
                            <input type="password" name="newspassword" id="user-name" placeholder="请确认密码" value="">
                           
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


</body>

</html>








<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>

<script type="text/javascript">
    $('#check_rule_all').click(function(){
    if($(this).is(':checked'))
    {
        $('.ids').prop('checked',true);
    }else{
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
        window.location.href="/index.php/admin/Index/delrule/id/"+idds;
        });
    
</script>
</body>
</html>
