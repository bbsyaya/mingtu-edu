<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/24
 * Time: 1:01
 */

namespace Admin\Controller;

use Think\Controller;

class HomeController extends AutoController
{
    public function index()
    {
        $home = M('system')->where(array('type' => 0))->find();
        $categories = M('category')->where(array('type != 0 AND type != -1'))->select();
        $information = json_decode(base64_decode($home['information']),1);
        $text = '';
        foreach ($information as $k=>$v){
            $text .= $k.'-'.$v;
            $text .= '+';
        }
        $text = substr($text,0,strlen($text)-1);
        $home['information'] = $text;
        $this->categories = $categories;
        $this->home = $home;
        $this->display();
    }

    public function img()
    {
        $images = M('images')->select();
        foreach ($images as $k=>$v){
            if(!$v['name']){
                M('images')->where(['id' => $v['id']])->delete();
            }
        }
        $images = M('images')->where('en = 0')->select();
        $this->images = $images;
        $this->display();
    }

    public function home_add(){
        if(I('post.')){
            $info = I('post.information');
            $arr = explode('+',$info);
            $information = array();
            foreach ($arr as $v){
                $tmp = explode('-',$v);
                $information[$tmp[0]] = $tmp[1];
            }
            $_POST['information'] = base64_encode(json_encode($information));
            $t = M('system')->where(array('type' => I('post.type')))->save(I('post.'));
            if($t == 0 || $t == 1){
                $this->success('保存成功');
            }else{
                $this->error('保存失败');
            }
        }else{
            $this->error('保存失败');
        }
    }
}