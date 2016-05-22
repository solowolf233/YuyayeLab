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
    <style type="text/css">
    /* Builder样式 */
    .builder .builder-container .builder-data-empty {
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }
    .builder .builder-container .builder-data-empty .empty-info {
        padding: 130px 0;
        color: #555;
    }
    .builder .builder-container .builder-table .table td {
        max-width: 600px;
        vertical-align: middle;
        overflow: hidden;
    }
    .builder .builder-container .builder-table .table td img.picture {
        max-width: 200px;
        max-height: 40px;
    }
    .builder .builder-container .pagination {
        margin-top: 0px;
    }
    .builder.formbuilder-box .form-builder .img-box .remove-picture {
        color: red;
        position: absolute;
        top: 0;
        right: 2px;
        background: #fff;
        border-radius: 20px;
        cursor: pointer;
    }
    .builder.formbuilder-box .form-builder .img-box .remove-picture:hover {
        color: #DD0000;
        box-shadow: inset 0 1px 1px red, 0 0 8px red;
    }
    .builder.formbuilder-box .form-builder .file-box .remove-file {
        color: red;
        position: absolute;
        top: 12px;
        right: 10px;
        border-radius: 20px;
        cursor: pointer;
    }
    .builder.formbuilder-box .form-builder .file-box .remove-file:hover {
        color: #DD0000;
        box-shadow: inset 0 1px 1px red, 0 0 8px red;
    }
    .builder.formbuilder-box .form-builder .board_list .board {
        padding: 0px;
        margin-right: 10px;
    }
    @media (min-width: 768px) {
        .builder.formbuilder-box .form-builder .input,
        .builder.formbuilder-box .form-builder .select,
        .builder.formbuilder-box .form-builder .textarea {
            width: 70%;
        }
        .builder.formbuilder-box .form-builder .submit,
        .builder.formbuilder-box .form-builder .return {
            min-width: 120px;
        }
        .builder.formbuilder-box .form-builder.form-horizontal {
            padding: 0 15px;
        }
        .builder.formbuilder-box .form-builder.form-horizontal .control-label {
            text-align: left;
        }
        .builder.formbuilder-box .form-builder.form-horizontal .left {
            width: 15%;
            float: left;
        }
        .builder.formbuilder-box .form-builder.form-horizontal .right {
            width: 85%;
            float: left;
        }
    }
    @media (min-width: 992px) {
        .builder.formbuilder-box .form-builder.form-horizontal .left {
            width: 12%;
            float: left;
        }
        .builder.formbuilder-box .form-builder.form-horizontal .right {
            width: 88%;
            float: left;
        }
    }
</style>


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
                    
    <div class="builder listbuilder-box panel-body">


    <!-- Tab导航 -->
    <?php if(!empty($tab_nav)): ?><div class="builder-tabs">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <?php if(is_array($tab_nav["tab_list"])): $i = 0; $__LIST__ = $tab_nav["tab_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab): $mod = ($i % 2 );++$i;?><li class="<?php if($tab_nav['current_tab'] == $key) echo 'active'; ?>"><a href="<?php echo ($tab["href"]); ?>"><?php echo ($tab["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form-group"></div><?php endif; ?>

    <!-- 顶部工具栏按钮 -->
    <?php if(!empty($top_button_list)): ?><div class="builder-toolbar">
            <div class="row">
                <!-- 工具栏按钮 -->
                <?php if(!empty($top_button_list)): ?><div class="col-xs-12 col-sm-9 button-list clearfix">
                        <div class="form-group">
                            <?php if(is_array($top_button_list)): $i = 0; $__LIST__ = $top_button_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$button): $mod = ($i % 2 );++$i;?><a <?php echo ($button["attribute"]); ?>><?php echo ($button["title"]); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div><?php endif; ?>

                <!-- 搜索框 -->
                <?php if(!empty($search)): ?><div class="col-xs-12 col-sm-3 clearfix">
                        <form class="form" method="get" action="<?php echo ($search["url"]); ?>">
                            <div class="form-group">
                                <div class="input-group search-form">
                                    <input type="text" name="keyword" class="search-input form-control" value="<?php echo ($_GET["keyword"]); ?>" placeholder="<?php echo ($search["title"]); ?>">
                                    <span class="input-group-btn"><a class="btn btn-default search-btn"><i class="fa fa-search"></i></a></span>
                                </div>
                            </div>
                        </form>
                    </div><?php endif; ?>
            </div>
        </div><?php endif; ?>

    <!-- 数据列表 -->
    <div class="builder-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="builder-table">
                    <div class="panel panel-default table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><input class="check-all" type="checkbox"></th>
                                    <?php if(is_array($table_column_list)): $i = 0; $__LIST__ = $table_column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$column): $mod = ($i % 2 );++$i;?><th><?php echo (htmlspecialchars($column["title"])); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($table_data_list)): $i = 0; $__LIST__ = $table_data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                        <td><input class="ids" type="checkbox" value="<?php echo ($data[$table_data_list_key]); ?>" name="ids[]"></td>
                                        <?php if(is_array($table_column_list)): $i = 0; $__LIST__ = $table_column_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$column): $mod = ($i % 2 );++$i;?><td><?php echo ($data[$column['name']]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                <?php if(empty($table_data_list)): ?><tr class="builder-data-empty">
                                        <?php $tdcolspan = count($table_column_list)+1 ?>
                                        <td class="text-center empty-info" colspan="<?php echo ($tdcolspan); ?>">
                                            <i class="fa fa-database"></i> 暂时没有数据<br>
                                            <span class="small">本系统由 <a href="<?php echo C('WEBSITE_DOMAIN');?>" class="text-muted" target="_blank"><?php echo C('PRODUCT_NAME');?></a> v<?php echo C('CURRENT_VERSION');?> 强力驱动</span>
                                        </td>
                                    </tr><?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if(!empty($table_data_page)): ?><ul class="pagination"><?php echo ($table_data_page); ?></ul><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 额外功能代码 -->
    <?php echo ($extra_html); ?>
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
    <script type="text/javascript">
    $(function() {
        //给数组增加查找指定的元素索引方法
        Array.prototype.indexOf = function(val) {
            for (var i = 0; i < this.length; i++) {
                if (this[i] == val) return i;
            }
            return -1;
        };

        //给数组增加删除方法
        Array.prototype.remove = function(val) {
            var index = this.indexOf(val);
            if (index > -1) {
                this.splice(index, 1);
            }
        };
    });
</script>


        </div>
    </div>
</body>
</html>