<?php
class message{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
        include 'admin/views/message.html';
    }
    //查看
    ///////////////////////////////////////////////////////////////////////////////////////
    function show(){
        $data=$this->mysql->query("select * from message")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }

    //删除
    ///////////////////////////////////////////////////////////////////////////////////////
    function del(){
        $cid=$_GET['cid'];
        $data=$this->mysql->query("delete  from message where mid='{$cid}'");
        if($this->mysql->affected_rows){
            echo 'ok';
        }else{
            echo 'error';
        }
    }
}