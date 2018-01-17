<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/addchengjichaxun.html";i:1501664235;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="__STATIC__/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__/assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/app.css">
</head>
<body data-type="generalComponents">
<div class="tpl-content-wrapper">

    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                答题列表添加
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
                    <form class="am-form am-form-horizontal" action="<?php echo url('Index/do_addchengjichaxun'); ?>" method="post"
                          enctype="multipart/form-data">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-name" name="mid" placeholder="姓名 / Name">
                                <small>输入你的名字，让我们记住你。</small>
                            </div>
                        </div>




                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">答题题目 / pid</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="pid">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-answer" class="am-u-sm-3 am-form-label">考生答案</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="answer"/>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-answer" class="am-u-sm-3 am-form-label">答题时间</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="pubdate"/>
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