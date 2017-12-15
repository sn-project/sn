<?php

//$model :文件名（函数名）
//$fn ：方法名
class router{
    //静态的
    static function run(){
        //得到路径信息
        if(!$_SERVER['PATH_INFO'] || $_SERVER['PATH_INFO']=='/'){
            $model='admin';
            $fn='index';
        }else{
            $pathinfo=explode('/',substr($_SERVER['PATH_INFO'],1));
            $model=$pathinfo[0];
            $fn=isset($pathinfo[1])?$pathinfo[1]:'index';
        }
        if(file_exists("admin/{$model}.php")){
            include 'admin/'.$model.'.php';
            if(class_exists($model)){
                $page=new $model();
                if(method_exists($page,$fn)){
                    $page->$fn();

                }else{
                    include 'admin/views/404.html';
                }
            }else{
                include 'admin/views/404.html';
            }
        }else{
            include 'admin/views/404.html';
        }
    }
}
