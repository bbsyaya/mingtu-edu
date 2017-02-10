<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2015/10/14
 * Time: 23:17
 * 主页面和登出
 */
namespace Admin\Controller;

use Think\Controller;

class IndexController extends AutoController
{
    //用session验证是否登陆
    public function index()
    {
        $data = I('user', '');
        if ($_SESSION['username'] != $data) {
            echo '<meta charset="utf-8"><script>alert("请登录");window.location="';
            echo U('Login/index');
            echo '"</script>';
            die;
        }
        $this->user = $data;
        $this->display();
    }

    //退出登录
    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirect("login/index");
    }
    
    //user列表
    public function user(){
        $users = M('admin')->select();
        $this->users = $users;
        $this->display();
    }
    
    //添加user
    public function add(){
        $this->display();
    }
    
    //
    public function xg(){
        if(I('get.')){
            $in = M('admin')->where(['id' => I('get.id')])->save(I('get.'));
            if($in == 0 || $in == 1){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }
    }

    public function tj(){
        if (I('get.')){
            $_GET['status'] = 1;
            $in = M('admin');
            $in->add(I('get.'));
            if($in == 1){
                $this->success('添加成功');
            }else{
                $this->error('添加失败');
            }
        }
    }

    public function sc(){
        if (I('get.id')){
            $in = M('admin');
            $in->where(['id'=>I('get.id')])->delete();
            if($in == 1){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }
    }
}