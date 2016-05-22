<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->success('测试阶段，自动进入后台', 'index.php/Admin/Index/index',1);
     }
}