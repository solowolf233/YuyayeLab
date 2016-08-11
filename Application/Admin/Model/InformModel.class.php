<?php
namespace Admin\Model;
use Think\Model;
/**
 * 通知信息模型
 */
class InformModel extends Model {
    /**
     * 数据库表名
     * @author jry <598821125@qq.com>
     */
    protected $tableName = 'inform';
 
 /**
     * 自动验证规则
     * @author 
     */
    protected $_validate = array (
        array('inform_title', 'require', '通知名称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('inform_title', '', '该通知已存在', self::MUST_VALIDATE, 'unique', self::MODEL_BOTH),
        array('inform_brief', 'require', '通知简介不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('inform_url', 'require', 'url不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        array('inform_url', 'url', '请输入正确的url', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
     
    );

    /**
     * 自动完成规则
     * @author
     */
    protected $_auto = array (
        array('begin_time', 'strtotime', self::MODEL_BOTH, 'function'),
        array('end_time', 'strtotime', self::MODEL_BOTH, 'function'),
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
        array('status', '1', self::MODEL_INSERT),
    );







}