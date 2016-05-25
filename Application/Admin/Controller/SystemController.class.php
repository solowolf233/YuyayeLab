<?php
namespace Admin\Controller;

use Think\Controller;

class SystemController extends  PublicController
{
     protected function _initialize() {
        $this->active_nav="系统设置";
        $this->assign('_user_auth', session('user_auth'));                // 用户登录信息  
    }
    public function index()
    {
       
        $this->active_left_nav="发布设置";
        $this->meta_title="消息设置";
        $this->display();

    }


}