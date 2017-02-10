<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/20
 * Time: 21:12
 */

namespace Home\Controller;
use Think\Controller;

class InitController extends Controller{
    protected $img;
    public function _initialize(){
        //首页分类start
        $category = M('category')->where('type = '.$_SESSION['flag'])->order('ord')->select();
        $categories = M('category')->where('type != 0 AND type != -1')->order('ord')->select();
//        var_dump($categories);die;
        $this->category = $category;
        $this->categories = $categories;
        //首页分类结束
        //首页设置配置
        $home = M('system')->where(array('lx_system.type' => $_SESSION['flag']))->join('lx_category on lx_category.id = lx_system.category')->find();
        //右侧联系人
        $information = json_decode(base64_decode($home['information']),1);
        $this->information = $information;
        //中英文识别
        if($_SESSION['flag'] == -1){
            $home['lan'] = '中文';
            $this->img = 1;
        }else{
            $home['lan'] = 'ENGLISH';
            $this->img = 0;
        }
        $this->home = $home;
        //dump($this->home);die;
        $_SESSION['home'] = $home;
        //底部滚图
        $limages = M('images')->where(['en' => $this->img,'type' => 1])->select();
        $this->limages = $limages;
    }
}