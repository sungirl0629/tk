<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/index/index.html";i:1501669817;s:72:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/header.html";i:1501657276;s:70:"/data/home/bxu2713300369/htdocs/application/tiku/view/public/menu.html";i:1501663772;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>随身题库后台管理</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__STATIC__assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="__STATIC__assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__STATIC__assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="__STATIC__assets/css/admin.css">
    <link rel="stylesheet" href="__STATIC__assets/css/app.css">
</head>
<body data-type="generalComponents">
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <a href="javascript:;" class="tpl-logo">
            <img src="__STATIC__assets/img/logo.png" alt="">
        </a>
    </div>
    <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
            
            
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

            <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                    <span class="tpl-header-list-user-nick"><?php echo $userinfo['username']; ?></span><span class="tpl-header-list-user-ico"> <img src="/Uploads/<?php echo $userinfo['photo']; ?>"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="javascript:" class="active"><span class="am-icon-bell-o"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="<?php echo url('Index/session_del'); ?>"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li><a href="###" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
        </ul>
    </div>
</header>
<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-left-nav tpl-left-nav-hover">
    <div class="tpl-left-nav-title">
        随身题库 列表
    </div>
    <div class="tpl-left-nav-list">
        <ul class="tpl-left-nav-menu">
            <li class="tpl-left-nav-item">
                <a href="index.html" class="nav-link active">
                    <i class="am-icon-home"></i>
                    <span>首页</span>
                </a>
            </li>
			<li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>会员管理</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/userlist'); ?>">会员列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
            </li>
			<li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>科目管理</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/sub_userlist'); ?>">科目列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
            </li>
			<li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>题库管理</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/timulist'); ?>">题目列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>

                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/xuanxianglist'); ?>">选项内容列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>


				<ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/answerlist'); ?>">答案列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
				<ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/chengjichaxun'); ?>">答题列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
				<ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/record_list'); ?>">错题记录表列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
				<ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/sc_userlist'); ?>">成绩列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
				<ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/textslist'); ?>">试题列表 </span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
            </li>
			<li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>权限管理</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/rulelist'); ?>">规则列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/grouplist'); ?>">用户组列表</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                    </li>
                </ul>
            </li>			
			<li class="tpl-left-nav-item">
                <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                    <i class="am-icon-table"></i>
                    <span>设置</span>
                    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                </a>
                <ul class="tpl-left-nav-sub-menu">
                    <li>
                        <a href="javascript:" class="active">
                            <i class="am-icon-angle-right"></i>
                            <span class="js-append-tab" data_id="<?php echo url('Index/shezhi'); ?>">修改密码</span>
                            <i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>
                        </a>
                </ul>
          
        </ul>
    </div>
</div>
    <style>
        .am-tabs-nav li {
            position: relative;
            z-index: 1;
        }
        .am-tabs-nav .am-icon-close {
            position: absolute;
            top: 0;
            right: 10px;
            color: #888;
            cursor: pointer;
            z-index: 100;
        }
        .am-tabs-nav .am-icon-close:hover {
            color: #333;
        }
        .am-tabs-nav .am-icon-close ~ a {
            padding-right: 25px!important;
        }
    </style>
    <div class="tpl-content-wrapper">
        <div class="tpl-portlet-components">
            <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="doc-tab-demo-1">
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li class="am-active"><a href="javascript: void(0)">首页</a></li>
                </ul>
                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-active">
                        <img src="__STATIC__assets/img/2.jpg" height="250px" width="480px"/>
						<img src="__STATIC__assets/img/1.jpg" height="250px" width="480px"/>
                    </div>
                </div>
            </div>
            <br />
        </div>
    </div>
</div>
<script src="__STATIC__assets/js/jquery.min.js"></script>
<script src="__STATIC__assets/js/amazeui.min.js"></script>
<script src="__STATIC__assets/js/app.js"></script>
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
        var tabCounter = 0;
        var $tab = $('#doc-tab-demo-1');
        var $nav = $tab.find('.am-tabs-nav');
        var $bd = $tab.find('.am-tabs-bd');

        function addTab(titletext,urls) {
            $('.am-nav-tabs li').removeClass('am-active');
            $('.am-tabs-bd > div').removeClass('am-active');
            var nav = '<li class="am-active"><span class="am-icon-close"></span>' +
                    '<a href="javascript: void(0)">'+titletext+'</a></li>';
            var content = '<div class="am-tab-panel am-active"><iframe class="J_iframe" name="iframe0" width="100%" height="100%" style="min-height: 500px;" src="'+urls+'" frameborder="0" seamless></iframe></div>';

            $nav.append(nav);
            $bd.append(content);
            tabCounter++;
            $tab.tabs('refresh');
        }
        // 动态添加标签页
        $('.js-append-tab').on('click', function() {
            var titletext = $(this).text();
            var index = $(".am-nav-tabs a:contains('" + titletext + "')").parent().index();
            //alert(index);
            if (index > 0)
            {
                $tab.tabs('open',index);
            }
            else
            {
                var urls=$(this).attr('data_id');
                //$.post(urls,{},function(data,textStatus){
                addTab(titletext,urls);
                //});
            }
        });

        // 移除标签页
        $nav.on('click', '.am-icon-close', function() {
            var $item = $(this).closest('li');
            var index = $nav.children('li').index($item);

            $item.remove();
            $bd.find('.am-tab-panel').eq(index).remove();

            $tab.tabs('open', index > 0 ? index - 1 : index + 1);
            $tab.tabs('refresh');
        });

    });

</script>

</body>

</html>