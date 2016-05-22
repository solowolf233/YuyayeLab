<?php
namespace Admin\Controller;

use Think\Controller;

class navController extends PublicController
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
        $map['id|nav_name'] = array($condition, $condition, '_multi'=>true);
        // 获取所有用户
        $map['status'] = array('egt', '0'); // 禁用和正常状态
        $nav_object=D('nav');
        $data_list = $nav_object
                   ->page($_GET['p'], 8)
                   ->where($map)
                   ->order('id asc')
                   ->select();
       
        $page = new \Think\Page(
            $nav_object->where($map)->count(),
            8
        );
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle('导航管理') // 设置页面标题
                ->setActiveNav('首页')
                ->addTopButton('addnew')  // 添加新增按钮
                ->addTopButton('resume')  // 添加启用按钮
                ->addTopButton('forbid')  // 添加禁用按钮
                ->addTopButton('delete')  // 添加删除按钮
                ->setSearch('请输入ID/导航名称', U('index'))
                ->addTableColumn('id', 'ID')
                ->addTableColumn('nav_name', '导航名称')
                ->addTableColumn('nav_level', '导航等级')
                ->addTableColumn('nav_href', '链接地址')
                ->addTableColumn('nav_sup', '上一级导航id')
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
            $nav_object=D('nav');
            $data = $nav_object->create();
            if ($data) {
                $result = $nav_object
                        ->field('id,nav_name,nav_level,nav_href,nav_sup')
                        ->save($data);
                if ($result) {
                    $this->success('更新成功', U('index'));
                } else {
                    $this->error('更新失败', $nav_object->getError());
                }
            } else {
                $this->error($nav_object->getError());
            }
        } else {
            // 获取导航信息
            $info = D('nav')->find($id);
            // 使用FormBuilder快速建立表单页面。
            $builder = new \Common\Builder\FormBuilder();
            $builder // 设置页面标题
                    ->setActiveNav('首页')
                    ->setMetaTitle('编辑通知')  // 设置页面标题
                    ->setPostUrl(U('edit'))    // 设置表单提交地址
                    ->addFormItem('id', 'hidden', 'ID', 'ID')
                    ->addFormItem('nav_name', 'text', '导航名称', '导航名称')
                    ->addFormItem('nav_level', 'text', '导航等级', '导航等级')
                    ->addFormItem('nav_href', 'text', '链接地址', '链接地址')
                    ->addFormItem('nav_sup', 'text', '上一级导航id', '上一级导航id')
                    ->setFormData($info)
                    ->display();
        }
    }
    /**
     * 新增导航
     * @author jry <598821125@qq.com>
     */
    public function add() {
        if (IS_POST) {
            $nav_object = D('nav');
            $data = $nav_object->create();
            if ($data) {
                $id = $nav_object->add($data);
                if ($id) {
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($nav_object->getError());
            }
        } else {
           $builder = new \Common\Builder\FormBuilder();
            $builder // 设置页面标题
                    ->setActiveNav('首页')
                    ->setMetaTitle('编辑通知')  // 设置页面标题
                    ->setPostUrl(U('add'))    // 设置表单提交地址
                    ->addFormItem('id', 'hidden', 'ID', 'ID')
                    ->addFormItem('nav_name', 'text', '导航名称', '导航名称')
                    ->addFormItem('nav_level', 'text', '导航等级', '导航等级')
                    ->addFormItem('nav_href', 'text', '链接地址', '链接地址')
                    ->addFormItem('nav_sup', 'text', '上一级导航id', '上一级导航id')
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
        
        parent::setStatus('nav');
    }
}