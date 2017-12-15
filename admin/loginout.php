<?php
class loginout{
    function __construct(){
        $obj=new db();
        $this->mysql=$obj->mysql;
    }
    function index(){
        unset($_SESSION);
        include 'admin/views/login.html';
    }
}