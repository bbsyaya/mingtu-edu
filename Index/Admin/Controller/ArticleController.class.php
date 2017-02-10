<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/21
 * Time: 1:09
 */

namespace Admin\Controller;

use Think\Controller;

class ArticleController extends AutoController
{
    //文章列表
    public function index()
    {
        $articles = M('article')->where('status = 1')->select();
        $page = new \Think\Page(count($articles), 10);
        $this->page = $page->show();
        $arr = M('article')->where('status = 1')->order("time desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->articles = $arr;
        $this->display();
    }

    //添加或者修改文章
    public function article()
    {
        if (I('get.id')) {
            if ($article = M('article')->where(array('aid' => I('get.id')))->find()) {
                $this->article = $article;
            }
        }
        $categories = M('category')->where('type != 0 and type != -1')->select();
        $this->categories = $categories;
        $this->display();
    }

    //文章回收站
    public function lj()
    {
        $articles = M('article')->where('status = 0')->select();
        $page = new \Think\Page(count($articles), 10);
        $this->page = $page->show();
        $arr = M('article')->where('status = 0')->order("time desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->articles = $arr;
        $this->display();
    }

    //删除文章以及回收
    public function sc()
    {
        if (I('get.id')) {
            $article = M('article')->where(array('aid' => I('get.id')))->find();
            if ($article['status'] == 1) {
                if (M('article')->where(array('aid' => I('get.id')))->save(array('status' => 0))) {
                    $this->success('删除成功');
                } else {
                    $this->error('删除失败');
                }
            } else {
                if (M('article')->where(array('aid' => I('get.id')))->save(array('status' => 1))) {
                    $this->success('回收成功');
                } else {
                    $this->error('回收失败');
                }
            }
        } else {
            $this->error('操作错误');
        }
    }

    //修改或增加文章
    public function update()
    {
        $_POST['author'] =  $_SESSION['username'];
//        var_dump(I('post.author'));
        if (I('post.id')) {
            $categorytype = M('category')->where(array('id' => $_POST['category']))->find();
            $categoryAll = M('category')->where(array('id' => $categorytype['type']))->find();
            if($categoryAll['type'] == -1){
                $_POST['en'] = 1;
            }else{
                $_POST['en'] = 0;
            }
            $_POST['categoryAll'] = $categoryAll['id'];
            $t = M('article')->where(array('aid' => I('post.id')))->save(I('post.','',''));
            if ($t == 0 || $t ==1) {
                $data = array(
                    'status' => 1,
                    'message' => '修改成功'
                );
                $this->ajaxReturn($data);
            } else {
                $data = array(
                    'status' => 0,
                    'message' => '修改失败'
                );
                $this->ajaxReturn($data);
            }
        } else {
            $categorytype = M('category')->where(array('id' => $_POST['category']))->find();
            $categoryAll = M('category')->where(array('id' => $categorytype['type']))->find();
            if($categoryAll['type'] == -1){
                $_POST['en'] = 1;
            }else{
                $_POST['en'] = 0;
            }
            $_POST['categoryAll'] = $categoryAll['id'];
            if (M('article')->add(I('post.','',''))) {
                $data = array(
                    'status' => 1,
                    'message' => '保存成功'
                );
                $this->ajaxReturn($data);
            } else {
                $data = array(
                    'status' => 0,
                    'message' => '保存失败'
                );
                $this->ajaxReturn($data);
            }
        }
    }
}