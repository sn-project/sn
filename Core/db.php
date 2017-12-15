<?php
class db{
    public $mysql;
    function __construct(){
        $this->config();
    }
    function config(){
        header('Content-type:text/html;charset=utf8');
        $this->mysql=new mysqli('localhost','root','','sv',3306);
        $this->mysql->query('set names utf8');
        if($this->mysql->connect_errno){
            echo '数据库连接失败，失败信息'.$this->mysql->connect_errno;
            exit();
        }
    }

}

