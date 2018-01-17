<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/addscore.html";i:1501831126;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/head.html";i:1501569306;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
                        成绩添加
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
                            <form action="do_addscore" method="post" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">会员 / mid</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="mid" id="rule_en_name" placeholder="会员 / mid">
                                        <small  id="showenmsg">输入会员ID。</small>
                                    </div>
                                </div>
								
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">成绩 / score</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="score" id="rule_en_name" placeholder="成绩 / score">
                                        <small  id="showenmsg">输入成绩。</small>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">科目 / sub_id</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="tid" id="rule_en_name" placeholder="试题 / tid">
                                        <small  id="showenmsg">输入科目ID。</small>
                                    </div>
                                </div>
								
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">答题时间 / pubdate</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="pubdate" id="rule_en_name" placeholder="答题时间 / pubdate">
                                        <small  id="showenmsg">输入答题时间。</small>
                                    </div>
                                </div>                            								                            
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary">保存添加</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

<script src="__STATIC__/assets/js/jquery.min.js"></script>
<script src="__STATIC__/assets/js/amazeui.min.js"></script>
<script src="__STATIC__/assets/js/app.js"></script>
    <script type="text/javascript">
        $(function() {
$("#doc-form-file").change(function() {
var $file = $(this);
var fileObj = $file[0];
var windowURL = window.URL || window.webkitURL;
var dataURL;
var $img = $("#preview");
 
if(fileObj && fileObj.files && fileObj.files[0]){
dataURL = windowURL.createObjectURL(fileObj.files[0]);
$img.attr('src',dataURL);
}else{
dataURL = $file.val();
var imgObj = document.getElementById("preview");
// 两个坑:
// 1、在设置filter属性时，元素必须已经存在在DOM树中，动态创建的Node，也需要在设置属性前加入到DOM中，先设置属性在加入，无效；
// 2、src属性需要像下面的方式添加，上面的两种方式添加，无效；
imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
 
}
});
});

    </script>
<script type="text/javascript">
    $('#rule_en_name').blur(function(){
        var Enname=$(this).val();
        if(Enname=='')
        {
            $('#showenmsg').html('会员id不可为空');
            $('#showenmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        //alert(Enname);
        $.ajax({
            url:"<?php echo url('Index/checkenname'); ?>",
            type:"post",
            data:{names:Enname},
            success:function(data){
                $('#showenmsg').html(data.msg);
                if(data.status)
                {
                    $('#showenmsg').css('color','red');
                    $('.am-btn-primary').attr('disabled',true);
                }
                else
                {
                    $('#showenmsg').css('color','green');
                    $('.am-btn-primary').attr('disabled',false);
                }
            }
        });
    });
    $('#rule_zh_name').blur(function(){
        var zhname=$(this).val();
        if(zhname=='')
        {
            $('#showzhmsg').html('科目描述名称不可为空');
            $('#showzhmsg').css('color','red');
            $('.am-btn-primary').attr('disabled',true);
            return false;
        }
        //alert(Enname);
        $.ajax({
            url:"<?php echo url('Index/checkzhname'); ?>",
            type:"post",
            //{名:值;名:值;名:值}
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
            },
            error:function(){
                alert('未知错误');
            }
        });
    });
</script>
</body>

</html>