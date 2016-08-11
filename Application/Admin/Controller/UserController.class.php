<?php
namespace Admin\Controller;

use Think\Controller;

class UserController extends  PublicController
{
     protected function _initialize() {
        $this->active_nav="用户管理";
        $this->assign('_user_auth', session('user_auth'));  // 用户登录信息  
         $this->active_left_nav="用户管理";              
    }
    public function config()
    {
       
    if (IS_POST) {
            // 提交数据
            $config_object=D('config');
            if ($data) {
                $result = $link_object
                        ->field('id,link_name,nav_href')
                        ->save($data);
                if ($result) {
                    $this->success('设置成功', U('index'));
                } else {
                    $this->error('设置失败', $link_object->getError());
                }
            } else {
                $this->error($link_object->getError());
            }
        } else {
            // 获取导航信息
            $info['register'] = D('config')->where('config = "register"')->getField('value');
            $register_type=json_decode( D('config')->where('config = "register_type"')->getField('value')) ;
             foreach ($register_type as $key => $value) {
               $info['register_type'][]=$value;
             }
          
             $ban_username =json_decode( D('config')->where('config = "ban_username"')->getField('value')) ;
             foreach ($ban_username as $key => $value) {
               $info['ban_username']= $info['ban_username'].$value.',';
             }
           //使用FormBuilder快速建立表单页面。
              $builder = new \Common\Builder\FormBuilder();
                  $builder // 设置页面标题
                    ->setActiveNav('用户管理')
                    ->setMetaTitle('用户设置')  // 设置页面标题
                    ->setPostUrl(U('config'))    // 设置表单提交地址
                    ->addFormItem('register', 'radio', '注册开启', '注册开启',array('1' => '开启', '0' => '关闭'))
                    ->addFormItem('register_type', 'checkbox', '注册方式', '注册方式选择', array('1' => '用户名注册', '2' => '邮箱注册','3'=>'手机注册'))
                    ->addFormItem('ban_username', 'textarea','禁止使用的用户名', '英式逗号分隔')
                    ->setFormData($info)
                    ->display();
        }

        
    }
     public function statistics(){
        $this->privary=D('user')->where('gender="保密"')->count();
        $this->female=D('user')->where('gender="男"')->count();
        $this->male=D('user')->where('gender="女"')->count();
        $this->display();

     }
     public function user(){
        // 搜索
        $keyword   = I('keyword', '', 'string');
        $condition = array('like','%'.$keyword.'%');
        $map['id|username'] = array($condition, $condition, '_multi'=>true);
        // 获取所有通知
        $map['status'] = array('egt', '0'); // 禁用和正常状态
        $map['user_type'] = array('egt', '3');
        $user_object=D('user');
        $data_list = $user_object
                   ->page($_GET['p'], 5)
                   ->where($map)
                   ->order('id asc')
                   ->select();
       foreach ($data_list as $key => $value) {
         if ($value['user_type']==3){
            $value['user_type_tight']='正常';
         }
         else if($value['user_type']==4){
            $value['user_type_tight']='禁止发言';
         }
          else if($value['user_type']==5){
            $value['user_type_tight']='禁止上传文件';
         }
          else if($value['user_type']==6){
            $value['user_type_tight']='禁止发言和上传文件';
         }
           $data_list[$key]=$value;
       }
        $page = new \Think\Page(
            $user_object->where($map)->count(),
            5
        );
        
        // 使用Builder快速建立列表页面。
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle('用户列表') // 设置页面标题
                ->setActiveNav('用户管理')
                ->addTopButton('addnew')  // 添加新增按钮
                ->addTopButton('resume')  // 添加启用按钮
                ->addTopButton('forbid')  // 添加禁用按钮
                ->addTopButton('delete')  // 添加删除按钮
                ->setSearch('请输入ID/用户名', U('index'))
                ->addTableColumn('id', 'UID')
                ->addTableColumn('reg_type', '注册方式')
                ->addTableColumn('nickname', '昵称')
                ->addTableColumn('username', '用户名')
                ->addTableColumn('email', '邮箱')
                ->addTableColumn('mobile', '手机号')
                ->addTableColumn('create_time', '注册时间', 'time')
                ->addTableColumn('user_type_tight', '权限')
                ->addTableColumn('status', '是否允许登录', 'status')
                ->addTableColumn('right_button', '操作', 'btn')
                ->setTableDataList($data_list)    // 数据列表
                ->setTableDataPage($page->show()) // 数据列表分页
                ->addRightButton('edit')          // 添加编辑按钮
                ->addRightButton('forbid')        // 添加禁用/启用按钮
                ->addRightButton('recycle')        // 添加删除按钮
                ->display();
    }
    public function admin(){
                  // 搜索
        $keyword   = I('keyword', '', 'string');
        $condition = array('like','%'.$keyword.'%');
        $map['id|username'] = array($condition, $condition, '_multi'=>true);
        // 获取所有通知
        $map['status'] = array('egt', '0'); // 禁用和正常状态
        $map['user_type'] = array('elt', '2');
        $user_object=D('user');
        $data_list = $user_object
                   ->page($_GET['p'], 5)
                   ->where($map)
                   ->order('id asc')
                   ->select();
foreach ($data_list as $key => $value) {
         if ($value['user_type']==1){
            $value['user_type_tight']='超级管理员';
         }
         else if($value['user_type']==2){
            $value['user_type_tight']='管理员';
         }
           $data_list[$key]=$value;
       }
        $page = new \Think\Page(
            $user_object->where($map)->count(),
            5
        );

        // 使用Builder快速建立列表页面。
        $builder = new \Common\Builder\ListBuilder();
        $builder->setMetaTitle('管理员列表') // 设置页面标题
                ->setActiveNav('用户管理')
                ->addTopButton('addnew')  // 添加新增按钮
                ->addTopButton('resume')  // 添加启用按钮
                ->addTopButton('forbid')  // 添加禁用按钮
                ->addTopButton('delete')  // 添加删除按钮
                ->setSearch('请输入ID/用户名', U('index'))
                ->addTableColumn('id', 'UID')
                ->addTableColumn('reg_type', '注册方式')
                ->addTableColumn('nickname', '昵称')
                ->addTableColumn('username', '用户名')
                ->addTableColumn('email', '邮箱')
                ->addTableColumn('mobile', '手机号')
                ->addTableColumn('create_time', '注册时间', 'time')
                ->addTableColumn('user_type_tight', '权限')
                ->addTableColumn('status', '是否允许登录', 'status')
                ->addTableColumn('right_button', '操作', 'btn')
                ->setTableDataList($data_list)    // 数据列表
                ->setTableDataPage($page->show()) // 数据列表分页
                ->addRightButton('edit')          // 添加编辑按钮
                ->addRightButton('forbid')        // 添加禁用/启用按钮
                ->addRightButton('recycle')        // 添加删除按钮
                ->display();
    }
     /**
     * 新增用户
     * @author jry <598821125@qq.com>
     */
    public function add() {
        // if (IS_POST) {  
        //     $user_object = D('User');
        //     $data = $user_object->create();
        //     if ($data) {
        //         $id = $user_object->add($data);
        //         if ($id) {
        //             $this->success('新增成功', U('index'));
        //         } else {
        //             $this->error('新增失败');
        //         }
        //     } else {
        //         $this->error($user_object->getError());
        //     }
        // } else {
        //     // 使用FormBuilder快速建立表单页面。
        //     $builder = new \Common\Builder\FormBuilder();
        //     $builder->setMetaTitle('新增用户') //设置页面标题
        //             ->setPostUrl(U('add'))    //设置表单提交地址
        //             ->addFormItem('reg_type', 'hidden', '注册方式', '注册方式')
        //             ->addFormItem('nickname', 'text', '昵称', '昵称')
        //             ->addFormItem('username', 'text', '用户名', '用户名')
        //             ->addFormItem('password', 'password', '密码', '密码')
        //             ->addFormItem('gender', 'select', '性别', '性别',array('保密'=>'保密','男'=>'男','女'=>'女'))
        //             ->addFormItem('email', 'text', '邮箱', '邮箱')
        //             ->addFormItem('mobile', 'text', '手机号', '手机号')
        //             ->addFormItem('user_type','select','权限设置','权限设置',array('2'=>'管理员','3'=>'用户','4'=>'禁言用户','5'=>'禁止上传文件的用户','6'=>'禁言所有操作的用户'))
        //             ->setFormData(array('reg_type' => 'admin'))
        //             ->display();
        // }
    }

    /**
     * 编辑用户
     */
    public function edit($id) {
        if (IS_POST) {
            // 密码为空表示不修改密码
            if ($_POST['password'] === '') {
                unset($_POST['password']);
            }
            if(D('user')->where('id="'.I('post.id').'"')->getField('user_type') === '1') {
                $this->error('超级管理员不允许操作');
            }
            $user_object = D('User');
            $data = $user_object->create();
            if ($data) {
                $result = $user_object
                        ->field('id,nickname,username,email,mobile,gender,update_time,user_type')
                        ->save($data);
                if ($result) {
                    $this->success('更新成功', $_POST['user_type']>=2?
                        U('user'):U('admin'));
                } else {
                    $this->error('更新失败', $user_object->getError());
                }
            } else {
                $this->error($user_object->getError());
            }
        } else {
            // 获取账号信息
            $info = D('User')->find($id);
            unset($info['password']);
            // 使用FormBuilder快速建立表单页面。
            $builder = new \Common\Builder\FormBuilder();
            $builder->setMetaTitle('编辑用户')  // 设置页面标题
                    ->setPostUrl(U('edit'))    // 设置表单提交地址
                    ->addFormItem('id', 'hidden', 'ID', 'ID')
                    ->addFormItem('nickname', 'text', '昵称', '昵称')
                    ->addFormItem('username', 'text', '用户名', '用户名')
                    ->addFormItem('password', 'password', '密码', '密码')
                    ->addFormItem('gender', 'select', '性别', '性别',array('保密'=>'保密','男'=>'男','女'=>'女'))
                    ->addFormItem('email', 'text', '邮箱', '邮箱')
                    ->addFormItem('mobile', 'text', '手机号', '手机号')
                    ->addFormItem('user_type','select','权限设置','权限设置',array('2'=>'管理员','3'=>'用户','4'=>'禁言用户','5'=>'禁止上传文件的用户','6'=>'禁言所有操作的用户'))
                    ->setFormData($info)
                    ->display();
        }
    }

    /**
     * 设置一条或者多条数据的状态
     */

    public function setStatus($model = CONTROLLER_NAME){
        $ids = I('request.ids');
        if (is_array($ids)) {
            if(in_array('1', $ids)) {
                $this->error('超级管理员不允许操作');
            }
        } else {
            if($ids === '1') {
                $this->error('超级管理员不允许操作');
            }
        }
        parent::setStatus($model);
    }
}