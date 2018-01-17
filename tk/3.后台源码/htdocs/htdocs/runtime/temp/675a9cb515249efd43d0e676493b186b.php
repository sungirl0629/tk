<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/addtimu.html";i:1501565745;}*/ ?>
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
 <div class="tpl-content-wrapper">
           
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 题目添加
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
                            <form class="am-form tpl-form-line-form" action="<?php echo url('Index/do_addtimu'); ?>" method="post" enctype="multipart/form-data">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">题目 <span class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input name="title" type="text" class="tpl-form-input" id="user-name" placeholder="请输入题目">
                                        <small>请填写题目文字10-20字左右。</small>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">题目分数 <span class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input name="subject_score" type="text" class="tpl-form-input" id="user-name" placeholder="请输入题目分数">
                                        <small>填写分数在1—100分之间</small>
                                    </div>
                                </div>


                                 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">所属科目/ Group</label>
                                    <div class="am-u-sm-9">
                                        <select name="subject_id">
                                        <option value="0">--请选择--</option>
                                            <?php if(is_array($grouplist) || $grouplist instanceof \think\Collection || $grouplist instanceof \think\Paginator): if( count($grouplist)==0 ) : echo "" ;else: foreach($grouplist as $key=>$info): ?>
											<option value="<?php echo $info['id']; ?>"><?php echo $info['subname']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
										
                                    </div>
                                </div>
								 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">题目类型/ Group</label>
                                    <div class="am-u-sm-9">
                                        <select name="type">
                                        <option>--请选择--</option>
											<option value="1">单选题</option>
											<option value="2">多选题</option>
											<option value="3">填空题</option>
											<option value="4">解答题</option>
                                        </select>
										
                                    </div>
                                </div>

                               

                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label>
                                    <div class="am-u-sm-9">
                                        <div class="am-form-group am-form-file">
                                            <div class="tpl-form-file-img">
                                                <img style="max-height: 200px; width: auto;" id="preview" src="__STATIC__/assets/img/a5.png" alt="">
                                            </div>
                                            <button type="button" class="am-btn am-btn-danger am-btn-sm">
    <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                            <input name="photo" id="doc-form-file" type="file" multiple>
                                        </div>

                                    </div>
                                </div>
								
                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">题目内容</label>
                                    <div class="am-u-sm-9">
                                        <textarea name="content" class="" rows="10" id="user-intro" placeholder="请输入题目内容"></textarea>
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

