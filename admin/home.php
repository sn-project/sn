<?php
class home{
    function __construct(){
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'admin/views/message.html';
    }
    function brands(){
        include 'admin/views/header.html';
        include 'admin/views/brands.html';
    }
    function brandsQuery(){
        $data=$this->mysql->query("select * from message")->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    }
}
