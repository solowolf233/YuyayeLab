<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends PublicController
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
    

        $this->active_nav="首页";
        $this->assign('_user_auth', session('user_auth'));                // 用户登录信息  
    }
    public function index()
    {
      
        $this->active_left_nav="网站情况";
        $this->meta_title="系统信息";
        $this->display();

    }

    public function showRegisterNumber()
    {
        $today = strtotime(date('Y-m-d', time())); //今天
        $start_date = I('get.start_date') ? strtotime(I('get.start_date')) : $today-14*86400;
        $end_date   = I('get.end_date') ? (strtotime(I('get.end_date'))+1) : $today+86400;
        $count_day  = ($end_date-$start_date)/86400; //查询最近n天
        $user_object = D('User');
        for($i = 0; $i < $count_day; $i++){
            $day = $start_date + $i*86400; //第n天日期
            $day_after = $start_date + ($i+1)*86400; //第n+1天日期
            $map['create_time'] = array(
                array('egt', $day),
                array('lt', $day_after)
            );
            $user_reg_date[] = date('m月d日', $day);
            $user_reg_count[] = (int)$user_object->where($map)->count();
        }
        $this->assign('start_date', date('Y-m-d', $start_date));
        $this->assign('end_date', date('Y-m-d', $end_date-1));
        $this->assign('count_day', $count_day);
        $this->assign('user_reg_date', json_encode($user_reg_date));
        $this->assign('user_reg_count', json_encode($user_reg_count));
        $this->active_left_nav="网站情况";
        $this->meta_title="网站近期注册人数一览";
        $this->display();
    }
    public function showStorageSpace()
    {
        $file_object = D('file');
        $file_type = array_unique($file_object->getField('file_ext',true));
        foreach ($file_type as $key => $value) {
                $file_data[]=$file_object->where('file_ext="'.$value.'"')->sum('file_size');
        }
        $this->assign('file_type',$file_type);
        $this->assign('file_data',$file_data);
        $this->active_left_nav="网站情况";
        $this->meta_title="网站现存储存空间";
        $this->display();
    }
}