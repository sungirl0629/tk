<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/adduser.html";i:1501664235;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/head.html";i:1501569306;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/foot.html";i:1501569305;}*/ ?>
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
            添加会员
        </div>


    </div>
    <div class="tpl-block ">

        <div class="am-g tpl-amazeui-form">


            <div class="am-u-sm-12 am-u-md-9">
                <form class="am-form am-form-horizontal" action="<?php echo url('Index/do_adduser'); ?>" method="post" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                        <div class="am-u-sm-9">
                            <input type="text" name="username" id="user-name" placeholder="姓名 / Name">
                            <small>输入你的名字，让我们记住你。</small>
                        </div>
                    </div>
                    <!-- <div class="am-form-group"> -->
                        <!-- <label for="user-name" class="am-u-sm-3 am-form-label">密码 / Password</label> -->
                        <!-- <div class="am-u-sm-9"> -->
                            <!-- <input type="text" name="password" id="user-name" placeholder="密码 / Password"> -->
                            <!-- <small>输入你的密码，自己一定要记牢。</small> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">性别 / Sex</label>
                        <div class="am-u-sm-9">
                            <input type="radio" name="sex" id="user-phone" value="0" >男
                            <input type="radio" name="sex" id="user-phone" value="1" >女
                        </div>
                    </div>


                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">头像 / Photo</label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                    <img style="max-height: 200px; width: auto;" id="preview" src="__STATIC__/assets/img/a5.png" alt="">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                <input id="doc-form-file" name="photo" type="file" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">电话 / Telephone</label>
                        <div class="am-u-sm-9">
                            <input type="tel" name="telphone" id="user-phone" placeholder="输入你的电话号码 / Telephone">
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
</body>

</html>