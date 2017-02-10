<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/28
 * Time: 0:47
 */

namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class ImgController extends AutoController
{
    public function index(){
        if(I('get.id')){
            $image = M('images')->where(['id' => I('get.id')])->find();
            $this->image = $image;
        }
        $this->display();
    }

    //upload
    public function upload(){
        $upload = new Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->subName =  array('date','Ymd');
        // 上传文件
        $info   =   $upload->uploadOne($_FILES['photo']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $data['imgurl'] =  DEFAULT_HOME.'/Uploads/'.$info['savepath'].$info['savename'];
            $data['name'] = '';
            $data['url'] = '';
            $data['type'] = 0;
            $data['en'] = 0;
            $data['datetime'] = '';
            $in = M('images')->add($data);
            if($in){
                $image = M('images')->where(['imgurl' => $data['imgurl']])->find();
                $this->redirect('Img/index', array('id' => $image['id']), 3, '上传成功,请进行内容的补充,页面正在返回');
            }
        }
    }

    //修改内容
    public function tj(){
        if(I('post.')){
            $in = M('images')->where(['id' => I('post.id')])->save(I('post.'));
            if($in) {
                $data = array('status'=>1,'message' => '保存成功');
                $this->ajaxReturn($data);
            }else{
                $data = array('status'=>0,'message' => '保存失败');
                $this->ajaxReturn($data);
            }
        }
    }

    //删除
    public function sc(){
        if(I('get.')){
            $in = M('images')->where(['id' => I('get.id')])->delete();
            if($in){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }
    }
}