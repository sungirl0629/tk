<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/sub_adduser.html";i:1501664511;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/head.html";i:1501569306;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
            添加科目
        </div>


    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" action="<?php echo url('Index/sub_do_adduser'); ?>" method="post" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">科目名 / Subname</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="subname" id="rule_sub_name" placeholder="科目名 / Subname">
							<small id="showsubmsg"></small>
                        </div>
                    </div>
                    
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">内容 / Intro</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="intro" id="user-name" placeholder="内容 / Intro">
                        </div>
                    </div>


                   


                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary">确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>



</div>


<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>
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