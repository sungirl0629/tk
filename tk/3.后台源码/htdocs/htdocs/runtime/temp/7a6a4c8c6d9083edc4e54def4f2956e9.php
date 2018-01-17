<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/neironglist.html";i:1501664512;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__STATIC__/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__/assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/app.css">
</head>

<body data-type="generalComponents">
       
            
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                       选项内容添加
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
                        <div class="tpl-form-body tpl-form-line">



                            <form action="<?php echo url('Index/do_neironglist'); ?>" method="post" enctype="multipart/form-data"  class="am-form tpl-form-line-form">
                               

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">题号  / Pid<span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input name="pid" type="text" class="tpl-form-input" id="user-name" placeholder="请输入题目Pid">
                                       
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">选项  / linecode<span class="tpl-form-line-small-title"></span></label>
                                    <div class="am-u-sm-9">
                                        <input name="linecode" type="text" class="tpl-form-input" id="user-name" placeholder="请输入选项ABCDEF">
                                       
                                    </div>
                                </div>

                                

                             

 <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">选项内容/content</label>
                                    <div class="am-u-sm-9">
                                        <textarea name="content" class="" rows="10" id="user-intro" placeholder="请输入选项内容"></textarea>
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
            $('#showsubmsg').html('题号不可为空');
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