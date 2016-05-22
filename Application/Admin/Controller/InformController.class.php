<?php
namespace Admin\Controller;

use Think\Controller;

class InformController extends PublicController
{
    protected function _initialize() {
        // // 登录检测
        // if (!is_login()) { //还没登录跳转到登录页面
        //     $this->redirect('Admin/Public/login');
        // }
        // // 权限检测
        // else if (!D('Admin/user')->checkMenuAuth()) {
        //    $this->error('权限不足！', _Root_);
        //    }
    
        $this->active_left_nav="消息发布";
        $this->active_nav="首页";
        $this->assign('_user_auth', session('user_auth'));                // 用户登录信息  
    }
    public function index()
    {   
        // 搜索
        $keyword   = I('keyword', '', 'string');
        $condition = array('like','%'.$keyword.'%');
        $map['id|inform_title'] = array($condition, $condition, '_multi'=>true);
        // 获取所有用户
        $map['status'] = array('egt', '0'); // 禁用和正常状态
        $inform_object=D('inform');
        $data_list = $inform_object
                   ->page($_GET['p'], 5)
                   ->where($map)
                   ->order('id asc')
                   ->select();
       
        $page = new \Think\Page(
            $inform_object->where($map)->count(),
            5
        );
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle('首页消息发布') // 设置页面标题
                ->setActiveNav('首页')
                ->addTopButton('addnew')  // 添加新增按钮
                ->addTopButton('resume')  // 添加启用按钮
                ->addTopButton('forbid')  // 添加禁用按钮
                ->addTopButton('delete')  // 添加删除按钮
                ->setSearch('请输入ID/通知标题', U('index'))
                ->addTableColumn('id', 'ID')
                ->addTableColumn('inform_title', '通知标题')
                ->addTableColumn('inform_brief', '通知简介')
                ->addTableColumn('inform_url', '通知网页URl')
                ->addTableColumn('create_time', '通知创建时间', 'time')
                ->addTableColumn('begin_time', '通知开始时间', 'time')
                ->addTableColumn('update_time', '通知更新时间', 'time')
                ->addTableColumn('end_time', '通知结束时间', 'time')
                ->addTableColumn('status', '状态', 'status')
                ->addTableColumn('right_button', '操作', 'btn')
                ->setTableDataList($data_list)    // 数据列表
                ->setTableDataPage($page->show()) // 数据列表分页
                ->addRightButton('edit')          // 添加编辑按钮
                ->addRightButton('forbid')        // 添加禁用/启用按钮
                ->addRightButton('delete')        // 添加删除按钮
                ->display();
    }
        /**
     * 编辑用户
     * @author jry <598821125@qq.com>
     */
    public function edit($id) {
        if (IS_POST) {
            // 提交数据
            $inform_object=D('inform');
            $data = $inform_object->create();
            if ($data) {
                $result = $inform_object
                        ->field('id,inform_title,inform_brief,inform_url,update_time,end_time')
                        ->save($data);
                if ($result) {
                    $this->success('更新成功', U('index'));
                } else {
                    $this->error('更新失败', $inform_object->getError());
                }
            } else {
                $this->error($inform_object->getError());
            }
        } else {
            // 获取通知信息
            $info = D('inform')->find($id);
            $info['end_time']=time_format($info['end_time']);
            $info['begin_time']=time_format($info['begin_time']);
            // 使用FormBuilder快速建立表单页面。
            $builder = new \Common\Builder\FormBuilder();
            $builder // 设置页面标题
                    ->setActiveNav('首页')
                    ->setMetaTitle('编辑通知')  // 设置页面标题
                    ->setPostUrl(U('edit'))    // 设置表单提交地址
                    ->addFormItem('id', 'hidden', 'ID', 'ID')
                    ->addFormItem('inform_title', 'text', '通知标题', '通知标题')
                    ->addFormItem('inform_brief', 'text', '通知简介', '通知简介')
                    ->addFormItem('inform_url', 'text', '通知URL', '通知网页URL')
                    ->addFormItem('begin_time', 'text', '通知开始时间', '通知开始时间')
                    ->addFormItem('end_time', 'text', '通知结束时间', '通知结束时间')
                    ->setFormData($info)
                    ->display();
        }
    }
    /**
     * 新增通知
     * @author jry <598821125@qq.com>
     */
    public function add() {
        if (IS_POST) {
            $inform_object = D('inform');
            $data = $inform_object->create();
            if ($data) {
                $id = $inform_object->add($data);
                if ($id) {
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($inform_object->getError());
            }
        } else {
           $builder = new \Common\Builder\FormBuilder();
            $builder // 设置页面标题
                    ->setActiveNav('首页')
                    ->setMetaTitle('编辑通知')  // 设置页面标题
                    ->setPostUrl(U('add'))    // 设置表单提交地址
                    ->addFormItem('id', 'hidden', 'ID', 'ID')
                    ->addFormItem('inform_title', 'text', '通知标题', '通知标题')
                    ->addFormItem('inform_brief', 'text', '通知简介', '通知简介')
                    ->addFormItem('inform_url', 'text', '通知URL', '通知网页URL')
                    ->addFormItem('begin_time', 'text', '通知开始时间', '通知开始时间')
                    ->addFormItem('end_time', 'text', '通知结束时间', '通知结束时间')
                    ->setFormData($info)
                    ->display();
        }
    }

    /**
     * 设置一条或者多条数据的状态
     * @author jry <598821125@qq.com>
     */
    public function setStatus(){
        $ids = I('request.ids');
        
        parent::setStatus('inform');
    }
}