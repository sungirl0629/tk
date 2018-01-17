<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/uptests.html";i:1501748935;}*/ ?>
<head>
<!-- 新闻添加 -->
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
    <script src="__STATIC__/assets/js/echarts.min.js"></script>
</head>
<body> 
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        试题列表修改
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
                            <form class="am-form tpl-form-line-form" action="<?php echo url('Index/do_uptests'); ?>" method="post" >
							<input type="hidden" name="id" value="<?php echo $info['id']; ?>"/>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题<span class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input name="title" type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题" value="<?php echo $info['title']; ?>">
                                       
                                    </div>
                                </div>
								
                                 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">所属科目/ Group</label>
                                    <div class="am-u-sm-9">
                                        <select name="sid">
                                        <option value="0">--请选择--</option>
                                            <?php if(is_array($grouplist) || $grouplist instanceof \think\Collection || $grouplist instanceof \think\Paginator): if( count($grouplist)==0 ) : echo "" ;else: foreach($grouplist as $key=>$info): ?>
											<option <?php if($info['id'] == $info['id']): ?>selected="selected"<?php endif; ?>   value="<?php echo $info['id']; ?>"><?php echo $info['subname']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
								 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">题号/ pids</label>
                                    <div class="am-u-sm-9">
                                        <select name="pids">
                                        <option value="0">--请选择--</option>
                                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$info): ?>
											<option  <?php if($info['id'] == $info['id']): ?>selected="selected"<?php endif; ?>   value="<?php echo $info['id']; ?>"><?php echo $info['id']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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
       
</body>

