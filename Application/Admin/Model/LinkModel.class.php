<?php
namespace Admin\Model;
use Think\Model;
/**
 * 通知信息模型
 */
class NavModel extends Model {
    /**
     * 数据库表名
     * @author jry <598821125@qq.com>
     */
    protected $tableName = 'link';
 
/**
     * 自动验证规则
     * @author 
     */
    protected $_validate = array (
        array('link_name', 'require', '导航名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('link_name', '', '该导航已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
        array('link_href', 'url', '请输入正确的url', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
     
    );

    /**
     * 自动完成规则
     * @author 
     */
    protected $_auto = array (
        array('status', '1', self::MODEL_INSERT),
    );






}