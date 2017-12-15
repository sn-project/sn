<?php
class Article{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
        include 'admin/views/Article.html';
    }
    //查看
    ///////////////////////////////////////////////////////////////////////////////////////
    function show(){
        $data=$this->mysql->query("select * from article")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
    //添加
    ////////////////////////////////////////////////////////////////////////////////////
    function addArticle(){
        include 'admin/views/addArticle.html';
    }
    function insertArticle(){
        $data=$_POST;
        $keys=array_keys($data);
        $str='(';
        for($i=0;$i<count($keys);$i++){
            $str.=$keys[$i].',';
        }
        $str=substr($str,0,-1);
        $str.=') values (';
        foreach($data as $v){
            $str.="'{$v}',";
        }
        $str=substr($str,0,-1);
        $str.=')';
        $data=$this->mysql->query("insert into  article $str");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }

    }

    //删除
    ///////////////////////////////////////////////////////////////////////////////////////
    function del(){
        $id=$_GET['id'];
        $data=$this->mysql->query("delete  from Article where id='{$id}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
    function update(){
        $id=$_GET['id'];
        $type=$_GET['type'];
        $value=$_GET['value'];
        $data=$this->mysql->query("update Article set $type='{$value}' where id='{$id}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
    ///上传图片
    ////////////////////////////////////////////////////////////////
    function upload(){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            if(!file_exists('public/upload')){
                mkdir('public/upload');
            }
            $data = date('y-m-d');
            if(!file_exists('public/upload/'.$data)){
                mkdir('public/upload/'.$data);
            }
            $path = 'public/upload/'.$data.'/'.$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                echo '/sn/'.$path;
            }
        }
    }
    ///轮播
    ////////////////////////////////////////////////////////////////
    function lunbo(){
        include 'admin/views/lunbo.html';
    }
    //查看轮播
    ///////////////////////////////////////////////////////////////////////////////////////
    function showlunbo(){
        $data=$this->mysql->query("select * from lunbo")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
    //添加轮播
    ////////////////////////////////////////////////////////////////////////////////////
    function addlunbo(){
        include 'admin/views/addlunbo.html';
    }
    //添加轮播
    ////////////////////////////////////////////////////////////////////////////////////
    function insertlunbo(){
        $data=$_POST;
        $keys=array_keys($data);
        $str='(';
        for($i=0;$i<count($keys);$i++){
            $str.=$keys[$i].',';
        }
        $str=substr($str,0,-1);
        $str.=') values (';
        foreach($data as $v){
            $str.="'{$v}',";
        }
        $str=substr($str,0,-1);
        $str.=')';
        $data=$this->mysql->query("insert into  lunbo $str");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }

    }

    //删除轮播
    ///////////////////////////////////////////////////////////////////////////////////////
    function dellunbo(){
        $cid=$_GET['cid'];
        $data=$this->mysql->query("delete  from lunbo where lid='{$cid}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
    function updatelunbo(){
        $cid=$_GET['id'];
        $type=$_GET['type'];
        $value=$_GET['value'];
        $data=$this->mysql->query("update lunbo set $type='{$value}' where lid='{$cid}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
}