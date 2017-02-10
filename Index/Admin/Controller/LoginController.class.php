<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2015/10/14
 * Time: 23:17
 * 产生验证码，验证验证码，登陆页面是否是用XHR操作
 */
namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        $this->display();
    }

    //验证登陆
    public function check()
    {
        if ($_SERVER['HTTP_X_REQUESTED_WITH'] != "XMLHttpRequest") {
            echo '<meta charset="utf-8"><script>alert("请登录");window.location="';
            echo U('Login/index');
            echo '"</script>';
            die;
        }
        $data = array(
            'user' => I('user', ''),
            'pass' => I('pass', ''),
            'ip' => get_client_ip(),
            'time' => date('Y-m-d H:m:s', time())
        );
        $result = M('admin')->where(array('user' => $data['user'], 'pass' => $data['pass']))->find();
        M('admin')->save($data);
        if ($result) {
            $_SESSION['username'] = $data['user'];
            echo 'true';
        } else {
            echo 'false';
        }
    }

    //产生验证码
    public function verify()
    {
        // 配置文件要用C方法获取，生成验证码要传入配置，不能自动加载
        $config =	array(
            'seKey'     =>  'ThinkPHP.CN',   // 验证码加密密钥
            'codeSet'   =>  '123456789',             // 验证码字符集合
            'expire'    =>  1800,            // 验证码过期时间（s）
            'useZh'     =>  false,           // 使用中文验证码
            'useImgBg'  =>  false,           // 使用背景图片
            'fontSize'  =>  15,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  0,               // 验证码图片高度
            'imageW'    =>  0,               // 验证码图片宽度
            'length'    =>  3,               // 验证码位数
            'fontttf'   =>  '',              // 验证码字体，不设置随机获取
            'bg'        =>  array(243, 251, 254),  // 背景颜色
            'reset'     =>  true,           // 验证成功后是否重置
        );
        $verify = new Verify($config);
        $verify->entry('login');
    }

    //验证验证码
    public function checkVerify()
    {
        $verifyCode = I('verify', '', 'strtolower');
        if ((new Verify())->check($verifyCode, 'login'))
            return true;
        else return false;
    }
}