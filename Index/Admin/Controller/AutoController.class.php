<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2015/10/17
 * Time: 13:56
 */
namespace Admin\Controller;

use Think\Controller;

class AutoController extends Controller
{
    public function _initialize(){
        if (!$_SESSION['username']) {
            echo '<meta charset="utf-8"><script>alert("请登录");window.location="';
            echo U('Login/index');
            echo '"</script>';
            die;
        }
    }
}