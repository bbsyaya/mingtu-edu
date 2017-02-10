<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends InitController
{
    public function index()
    {
        //滚图
        $gimages = M('images')->where(['type'=> 0,'en' => $this->img])->select();
        $this->gimages = $gimages;
        //第一行的文章
        //判断中英
        if($_SESSION['flag'] == -1){
            $en = 1;
        }else{
            $en = 0;
        }
        $articles_1 = M('article')->where('home = 1 AND status = 1 AND en ='.$en)->join('lx_category on lx_category.id = lx_article.category')->order('time desc')->limit(3)->select();
        //var_dump($articles1);die;
        $this->articles_1 = $articles_1;
        //dump($articles1);die;
        //第二行的文章
        $articles_2 = M('article')->where(array('category' => $_SESSION['home']['category'], 'status' => 1))->order('time desc')->limit(4)->select();
        //dump($articles1);die;
        $this->articles_2 = $articles_2;
        $this->display();
    }

    public function article_list()
    {
        if (!I('get.category') && !I('get.search')) {
            $this->redirect('index');
        } elseif (I('get.category') && !I('get.search')) {
            //倒序显示
            $arr = M('article')->where(array('category' => I('get.category'), 'status' => 1))->order('time desc')->select();
            //分页 TODO 样式有问题
            $page = new \Think\Page(count($arr), C('PAGE'));
            $articles = M('article')->where(array('category' => I('get.category'), 'status' => 1))->join('lx_category on lx_article.category = lx_category.id')->order("time desc")->limit($page->firstRow . ',' . $page->listRows)->select();
            $page->setConfig('prev', '<li>前一页</li>');
            $page->setConfig('next', '<li>下一页</li>');
            $this->page = $page->show();
            $this->articles = $articles;
            //分类名称
            $cate = M('category')->where(['id' => I('get.category')])->find();
            $this->catelist = $cate;
            $this->display();
        } else {
            //search
            $arr = M('article')->where(array('title' => array('LIKE', '%' . I('get.search') . '%'), 'status' => 1))->order('time desc')->select();
            $page = new \Think\Page(count($arr), C('PAGE'));
            $articles = M('article')->where(array('title' => array('LIKE', '%' . I('get.search') . '%'), 'status' => 1))->join('lx_category on lx_category.id = lx_article.category')->order("time desc")->limit($page->firstRow . ',' . $page->listRows)->select();
            $page->setConfig('prev', '<li>前一页</li>');
            $page->setConfig('next', '<li>下一页</li>');
            $this->page = $page->show();
            $this->articles = $articles;
            $this->cate = ['categoryname' => '搜索结果'];
            $this->display();
        }
    }

    public function article()
    {
        if (!I('get.id')) {
            $this->redirect('index');
        } else {
            $id = I('get.id');
            $article = M('article')->where(array('lx_article.aid' => $id))->join('lx_category on lx_category.id = lx_article.category')->find();
            $this->article = $article;
//            var_dump($article);die;
            $this->display();
        }
    }

    public function change()
    {
        if ($_SESSION['flag'] == -1) {
            $_SESSION['flag'] = 0;
        } else {
            $_SESSION['flag'] = -1;
        }
        $this->redirect('home/index/index');
    }
}