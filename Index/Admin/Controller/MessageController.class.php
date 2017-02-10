<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/21
 * Time: 1:11
 */

namespace Admin\Controller;

use Think\Controller;

class MessageController extends AutoController
{
    //留言列表页
    public function index()
    {
        $messages = M('message')->order('time desc')->select();
        $this->messages = $messages;
        $this->display();
    }
}