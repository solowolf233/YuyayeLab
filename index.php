<?php
// +----------------------------------------------------------------------
// | OpenCMF [ Simple Efficient Excellent ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.opencmf.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: jry <598821125@qq.com>
// +----------------------------------------------------------------------

/**
 * Content-type设置
 */
header("Content-type: text/html; charset=utf-8");

/**
 * PHP版本检查
 */
if (version_compare(PHP_VERSION,'5.3.0','<')) {
    die('require PHP > 5.3.0 !');
}

/**
 * PHP报错设置
 */
error_reporting(E_ALL^E_NOTICE^E_WARNING);

/**
 * 开发模式环境变量前缀
 */


/**
 * 定义后台标记
 */
define('MODULE_MARK', 'Admin');

/**
 * 应用目录设置
 * 安全期间，建议安装调试完成后移动到非WEB目录
 */
define('APP_PATH', './Application/');

/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
define('RUNTIME_PATH', './Runtime/');

/**
 * 静态缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
define('HTML_PATH', RUNTIME_PATH.'Html/');




/**
 * 开起调试模式
 */
    define('APP_DEBUG', true);
/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './ThinkPHP/ThinkPHP.php';
