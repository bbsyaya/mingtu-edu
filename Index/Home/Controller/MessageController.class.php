<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/22
 * Time: 19:36
 */

namespace Home\Controller;
use Think\Controller;

class MessageController extends InitController
{
    public function index(){
        $this->display();
    }
    
    //留言add
    public function add(){
        $_POST['time'] = date("Y-m-d H:m:s",time());
        $_POST['ip'] = get_client_ip();
        M('message')->add(I('post.'));
    }
}