<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?php echo ($meta_title); ?>｜<?php echo C('WEB_SITE_TITLE');?>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="author" content="<?php echo C('WEB_SITE_TITLE');?>">
    <meta name="keywords" content="<?php echo ($meta_keywords); ?>">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <meta name="generator" content="CoreThink">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php echo C('WEB_SITE_TITLE');?>">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="apple-touch-icon" type="image/x-icon" href="/yuyaye/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/yuyaye/logo.png">
    <link rel="stylesheet" type="text/css" href="/yuyaye/Public/libs/cui/css/cui.min.css">
    <link rel="stylesheet" type="text/css" href="/yuyaye/./Application/Admin/View/Public/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/yuyaye/./Application/Admin/View/Public/css/theme/<?php echo C('ADMIN_THEME');?>.css">
    <link rel="stylesheet" type="text/css" href="/yuyaye/Public/libs/animate/animate.min.css">
    
    <link rel="stylesheet" type="text/css" href="/yuyaye/Public/libs/cui/css/cui.extend.min.css">

    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/yuyaye/Public/libs/jquery/1.x/jquery.min.js"></script>
</head>
<body>
    <div class="clearfix full-header">
      
    <!-- 顶部导航 -->
    <div class="navbar navbar-inverse navbar-fixed-top main-nav" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" target="_blank" href="/yuyaye/">
                    <span><?php echo C('PRODUCT_LOGO');?></span>
                </a>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-top">
         <!-- 主导航 -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo U('Index/index');?>" >
                        <i class="fa fa-home"></i>
                        <span>首页</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('System/index');?>" >
                        <i class="fa fa-cog"></i>
                        <span>系统设置</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('User/index');?>" >
                        <i class="fa fa-user"></i>
                        <span>用户管理</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Admin/Index/removeRuntime');?>" class="ajax-get no-refresh"><i class="fa fa-trash"></i> 清空缓存</a></li>
                <li><a target="_blank" href="/yuyaye/"><i class="fa fa-external-link-square"></i> 打开前台</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> <?php echo ($_user_auth["username"]); ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo U('Admin/Public/logout');?>" class="ajax-get"><i class="fa fa-sign-out"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
    </div>


    <div class="clearfix full-container">
    
        <input type="hidden" name="check_version_url" value="<?php echo U('Admin/Update/checkVersion');?>">
        
         <div class="container-fluid with-top-navbar">
            <div class="row">
                <!-- 后台左侧导航 -->
                <div id="sidebar" class="col-xs-12 col-sm-2 sidebar tab-content">
                    <!-- 模块菜单 -->
                   <nav class="navside navside-default" role="navigation">
                        <?php if ($active_nav=='首页'): ?>
                            <ul class="nav navside-nav navside-first">
                                <li>
                                     <a data-toggle="collapse" href="#navside-collapse--1">
                                            <i class="fa fa-folder-open-o"></i>
                                            <span class="nav-label">网站情况</span>
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                     <li <?php if($meta_title=='系统信息'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Index/index');?>" >
                                                            <i class="fa fa-wrench"></i>
                                                            <span class="nav-label">系统信息</span>
                                                        </a>
                                                    </li>
                                                     <li <?php if($meta_title=='网站近期注册人数一览'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Index/showRegisterNumber');?>">
                                                            <i class="fa fa-area-chart"></i>
                                                            <span class="nav-label">网站近期注册人数一览</span>
                                                        </a>
                                                    </li> <li <?php if($meta_title=='网站现存储存空间'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Index/showStorageSpace');?>">
                                                            <i class="fa fa-adjust"></i>
                                                            <span class="nav-label">网站现存储存空间</span>
                                                        </a>
                                                    </li>                                         
                                         </ul>
                                <li>
                                        <a data-toggle="collapse" href="#navside-collapse--2">
                                            <i class="fa fa-folder-open-o"></i>
                                            <span class="nav-label">消息发布</span>
                                            <span class="fa arrow"></span>
                                        </a>
                                         <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--2">
                                                     <li <?php if($meta_title=='首页消息发布'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Inform/index');?>">
                                                            <i class="fa fa-bullhorn"></i>
                                                            <span class="nav-label">首页消息发布</span>
                                                        </a>
                                                    </li> <li <?php if($meta_title=='快捷链接管理'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Link/index');?>" >
                                                            <i class="fa fa-link"></i>
                                                            <span class="nav-label">快捷链接管理</span>
                                                        </a>
                                                    </li>
                                                     <li <?php if($meta_title=='导航管理'):?>class="active" <?php endif; ?>>
                                                        <a href="<?php echo U('Nav/index');?>" >
                                                            <i class="fa fa-map-signs"></i>
                                                            <span class="nav-label">导航管理</span>
                                                        </a>
                                                    </li>                                           
                                        </ul>

                                </li>              
                            </ul>
                        <?php else : ?>
                            <?php if($active_nav=='用户管理'):?>
                                 <ul class="nav navside-nav navside-first">
                                        <li>
                                                <a data-toggle="collapse" href="#navside-collapse--1">
                                                    <i class="fa fa-folder-open-o"></i>
                                                    <span class="nav-label">系统设置</span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                        <li <?php if($meta_title=='用户设置'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span class="nav-label">用户设置</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='用户统计'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-area-chart"></i>
                                                                    <span class="nav-label">用户统计</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='用户列表'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-list"></i>
                                                                    <span class="nav-label">用户列表</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='用户类型'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>">
                                                                    <i class="fa fa-user"></i>
                                                                    <span class="nav-label">用户类型</span>
                                                                </a>
                                                              </li>
                                                 </ul>
                                        </li>
                                </ul>
                            <?php else : ?>
                                <?php if($active_nav=='系统设置'):?>
                                    <ul class="nav navside-nav navside-first">
                                        <li>
                                                <a data-toggle="collapse" href="#navside-collapse--1">
                                                    <i class="fa fa-folder-open-o"></i>
                                                    <span class="nav-label">权限管理</span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                        <li <?php if($meta_title=='用户权限'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span class="nav-label">用户权限</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='管理员权限'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-area-chart"></i>
                                                                    <span class="nav-label">管理员权限</span>
                                                                </a>
                                                            </li>
                                                 </ul>
                                        </li>
                                        <li>
                                                <a data-toggle="collapse" href="#navside-collapse--1">
                                                    <i class="fa fa-folder-open-o"></i>
                                                    <span class="nav-label">文件管理</span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                       <li <?php if($meta_title=='上传设置'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span class="nav-label">上传设置</span>
                                                                </a>
                                                        </li>
                                                 </ul>
                                        </li>
                                </ul>
                                <?php endif; ?>
                          <?php endif; ?>
                       <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>

        <!-- 右侧内容 -->
        <div id="main" class="col-xs-12 col-sm-10 main">
                <!-- 面包屑导航 -->
                <ul class="breadcrumb">
                    <li><i class="fa fa-map-marker"></i></li>
                    <li class="text-muted"><?php echo ($active_nav); ?></li>
                    <li class="text-muted"><?php echo ($active_left_nav); ?></li>
                    <li class="text-muted"><?php echo ($meta_title); ?></li>
                </ul>
                <!-- 后台内容部分 -->
                <div class="tab-content ct-tab-content">
                    
    <div class="chart">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-area-chart"></i> 文件储存统计-总容量500T-已用<?php echo ($rSize); ?>T
                    </div>
                    <div class="panel-body">
                        <h5 class="text-center">
                            <form action="<?php echo U('');?>" method="get">
                                <input id="start_date" name="start_date" value="<?php echo ($start_date); ?>"> 至
                                <input id="end_date" name="end_date" value="<?php echo ($end_date); ?>">
                               
                                <input id="submit" type="submit" class="btn btn-xs btn-default search-btn" value="查询">
                            </form>
                        </h5>
                        <canvas id="mychart" style="width:100%;height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        <div class="clearfix footer">
                            <div class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <a class="navbar-brand" target="_blank" href="/yuyaye/">
                                            <span><?php echo C('PRODUCT_NAME');?></span>
                                        </a>
                                    </div>
                                    <div class="collapse navbar-collapse navbar-collapse-bottom">
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <a href="<?php echo C('WEBSITE_DOMAIN');?>" class="text-muted" target="_blank">
                                                    <span>版权所有 © 2014-<?php echo date("Y",time()); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a class="text-muted pull-right">框架开发：<?php echo C('COMPANY_NAME');?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
   
                </div>
        </div>
       
    </div>
    <div class="clearfix full-footer">
        
    </div>

    <div class="clearfix full-script">
        <div class="container-fluid">
            <input type="hidden" id="corethink_home_img" value="/yuyaye/./Application/Home/View/Public/img">
            <script type="text/javascript" src="/yuyaye/Public/libs/cui/js/cui.min.js"></script>
            <script type="text/javascript" src="/yuyaye/./Application/Admin/View/Public/js/admin.js"></script>
            <script type="text/javascript">
                var admin_tabs = '<?php echo ($_admin_tabs); ?>';
                if(admin_tabs == '1' && !(self.frameElement != null && (self.frameElement.tagName == "IFRAME" || self.frameElement.tagName == "iframe"))){
                    parent.parent.location = "<?php echo U('Admin/Index/index');?>";
                }
            </script>
            
    <script type="text/javascript" src="/yuyaye/Public/libs/cui/js/cui.extend.min.js"></script>
    <script src="/yuyaye/Public/libs/chart/1.x/Chart.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // 用户增长曲线图
            var chart_data = {
                labels: <?php echo ($user_reg_date); ?>,
                datasets: [{
                    label: "用户存储增长曲线图",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: <?php echo ($user_reg_count); ?>
                }]
            };
            var chart_options = {
                scaleLineColor : "rgba(0,0,0,.1)", //X/Y轴的颜色
                scaleLineWidth : 1, //X/Y轴的宽度
            };
            var chart_element = document.getElementById("mychart").getContext("2d");
            var myLine = new Chart(chart_element).Line(chart_data, chart_options);

            // 日期
            $('#start_date').datetimepicker({
                format      : 'yyyy-mm-dd',
                autoclose   : true,
                minView     : 'month',
                todayBtn    : 'linked',
                language    : 'en',
                initialDate : '<?php echo ($start_date); ?>',
                fontAwesome : true,
            });
            $('#end_date').datetimepicker({
                format      : 'yyyy-mm-dd',
                autoclose   : true,
                minView     : 'month',
                todayBtn    : 'linked',
                language    : 'en',
                initialDate : '<?php echo ($end_date); ?>',
                fontAwesome : true,
            });
        });
    </script>

        </div>
    </div>
</body>
</html>