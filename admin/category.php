<?php
class category{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
        include 'admin/views/category.html';
    }
    //查看
    ///////////////////////////////////////////////////////////////////////////////////////
    function show(){
        $data=$this->mysql->query("select * from category")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
    //添加
    ////////////////////////////////////////////////////////////////////////////////////
    function addcolumn(){
        include 'admin/views/addCategory.html';
    }
    function insertcolumn(){
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
        $data=$this->mysql->query("insert into  category $str");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }

    }

    //删除
    ///////////////////////////////////////////////////////////////////////////////////////
    function del(){
        $cid=$_GET['cid'];
        $data=$this->mysql->query("delete  from category where cid='{$cid}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
    function update(){
        $cid=$_GET['id'];
        $type=$_GET['type'];
        $value=$_GET['value'];
        $data=$this->mysql->query("update category set $type='{$value}' where cid='{$cid}'");
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

}