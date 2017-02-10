<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2015/10/16
 * Time: 10:33
 */

namespace Admin\Controller;

use Think\Controller;

class CategoryController extends AutoController
{
    //分类列表
    public function index()
    {
        $categories = M('category')->select();
        $this->categories = $categories;
        $categoriesAll = M('category')->where('type = 0 or type = -1')->select();
        $this->categoriesAll = $categoriesAll;
        $this->display();
    }

    //添加分类
    public function add()
    {
        $categories = M('category')->where('type = 0 or type = -1')->select();
        $this->categories = $categories;
        $this->display();
    }

    //修改分类
    public function update()
    {
        if (I('get.')) {
            if (M('category')->where(array('id' => I('get.id')))->save(array('type' => I('get.type'), 'ord' => I('get.ord'), 'url' => I('get.url'), 'name' => I('get.name')))) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        } else {
            $this->error('修改失败');
        }
    }

    //添加分类
    public function addCategory()
    {
        if (I('get.')) {
            if (M('category')->add(I('get.'))) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->error('添加失败');
        }
    }

    //删除分类 同时删除子菜单以及文章
    public function sc()
    {
        if (I('get.id')) {
            if (M('category')->where(array('id' => I('get.id')))->delete()) {
                M('category')->where(array('type' => I('get.id')))->delete();
                M('article')->where(array('category' => I('get.id')))->delete();
                M('article')->where(array('categoryAll' => I('get.id')))->delete();
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('删除失败');
        }
    }
}