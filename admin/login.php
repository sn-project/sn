<?php
class login{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
        include 'admin/views/login.html';
    }
    function check(){
        $user=$_REQUEST['user'];
        $pass=$_REQUEST['password'];
        $data=$this->mysql->query("select * from admin where user='{$user}'")->fetch_all(1);
        for($i=0;$i<count($data);$i++){
            if($data[$i]['password']==$pass){
                echo 'ok';
                exit;
            }
        }
        echo 'error';

}
}