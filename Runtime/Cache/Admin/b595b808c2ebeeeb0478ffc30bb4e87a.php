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
                    <a href="<?php echo U('User/config');?>" >
                        <i class="fa fa-user"></i>
                        <span>用户管理</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('System/index');?>" >
                        <i class="fa fa-cog"></i>
                        <span>系统设置</span>
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
                                                    <span class="nav-label">用户管理</span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                        <li <?php if($meta_title=='用户设置'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('User/config');?>" >
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span class="nav-label">用户设置</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='用户统计'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('User/statistics');?>" >
                                                                    <i class="fa fa-area-chart"></i>
                                                                    <span class="nav-label">用户统计</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='用户列表'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('User/user');?>" >
                                                                    <i class="fa fa-list"></i>
                                                                    <span class="nav-label">用户列表</span>
                                                                </a>
                                                            </li><li <?php if($meta_title=='管理员列表'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('User/admin');?>">
                                                                    <i class="fa fa-user"></i>
                                                                    <span class="nav-label">管理员列表</span>
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
                                                    <span class="nav-label">发布设置</span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="nav navside-nav navside-second collapse in" id="navside-collapse--1">
                                                    <li <?php if($meta_title=='消息设置'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-area-chart"></i>
                                                                    <span class="nav-label">消息设置</span>
                                                                </a>
                                                            </li>
                                                    <li <?php if($meta_title=='消息管理'):?>class="active" <?php endif; ?>>
                                                            <a href="<?php echo U('Index/index');?>" >
                                                                <i class="fa fa-area-chart"></i>
                                                                <span class="nav-label">消息管理</span>
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
                                                         <li <?php if($meta_title=='上传列表'):?>class="active" <?php endif; ?>>
                                                                <a href="<?php echo U('Index/index');?>" >
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span class="nav-label">上传列表</span>
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
                    
                    <div role="tabpanel" class="fade in active" id="home">
                        <div class="dashboard clearfix">
                            <div class="col-xs-12 col-sm-6 col-lg-4 ct-update">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="update pull-right"></div>
                                        <i class="fa fa-cog"></i> 系统信息
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-condensed text-overflow">
                                            <tbody>
                                                <tr>
                                                    <td><?php echo C('PRODUCT_NAME');?>版本</td>
                                                    <td>
                                                        <span class="version">
                                                            v<?php echo C('CURRENT_VERSION');?>
                                                        </span>
                                                    </td>
                                            </tr>
                                                <tr>
                                                    <td>ThinkPHP版本</td>
                                                    <td><?php echo (THINK_VERSION); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>服务器操作系统</td>
                                                    <td><?php echo (PHP_OS); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>运行环境</td>
                                                    <td>
                                                        <?php
 $server_software = explode(' ', $_SERVER['SERVER_SOFTWARE']); echo $server_software[0]; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>PHP版本</td>
                                                    <td><?php echo PHP_VERSION; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>MYSQL版本</td>
                                                    <td><?php $system_info_mysql = M()->query("select version() as v;"); echo ($system_info_mysql["0"]["v"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>上传限制</td>
                                                    <td><?php echo ini_get('upload_max_filesize');?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-actions"></div>
                                        <i class="fa fa-th-list"></i> 开发者信息
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <td>网站标题</td>
                                                    <td><?php echo C('WEB_SITE_TITLE');?></td>
                                                </tr>
                                                <tr>
                                                    <td>网站内容</td>
                                                    <td><?php echo C('WEB_SITE_INFO');?></td>
                                                </tr>
                                                <tr>
                                                    <td>项目开发团队</td>
                                                    <td><?php echo C('DEVELOP_TEAM');?></td>
                                                </tr> 
                                                <tr>
                                                    <td>核心队员</td>
                                                    <td>施大焯</td>
                                                </tr>
                                                <tr>
                                                    <td>联系我们</td>
                                                    <td>
                                                        502414680@qq.com
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
            
        </div>
    </div>
</body>
</html>