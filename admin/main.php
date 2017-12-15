<?php
class main{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
//        $title='游戏管理';
        include 'admin/views/main.html';
    }

    //插入
    //////////////////////////////////////////////////////////////////////////////////////
//    function insert(){
//        $game=$_GET['gname'];
//        $type=$_GET['type'];
//        $data=$this->mysql->query("insert into  game (gname,type) VALUES ('{$game}',$type)");
//        if($this->mysql->affected_rows){
//            echo 'ok';
//        }else{
//            echo 'error';
//        }
//
//    }
//    //查看
//    ///////////////////////////////////////////////////////////////////////////////////////
//    function show(){
//        $data=$this->mysql->query("select * from game")->fetch_all(MYSQLI_ASSOC);
//        echo json_encode($data);
//    }
//    //删除
//    ///////////////////////////////////////////////////////////////////////////////////////
//    function del(){
//        $id=$_GET['id'];
//        $data=$this->mysql->query("delete  from game where gid='{$id}'");
//        if($this->mysql->affected_rows){
//            echo 'ok';
//        }else{
//            echo 'error';
//        }
//    }
//    function update(){
//        $this->mysql->query('set names utf8');
//
//        $id=$_GET['id'];
//        $type=$_GET['type'];
//        $value=$_GET['value'];
//        $data=$this->mysql->query("update game set $type='{$value}' where gid='{$id}'");
//        if($this->mysql->affected_rows){
//            echo 'ok';
//        }else{
//            echo 'error';
//        }
//    }

}