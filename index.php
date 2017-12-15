<?php
/**
 * 后台
 * 用户管理  商店管理  游戏管理  歌曲管理
 * uuser        shop     gamememanage     song
 * 添加、删除、修改、添加add、play     路由
 * //路由规则
/*localhost/ktv/home.php/shop/add
 * 对象名与文件名一致
 */

include 'Core/Debug.php';
include 'Core/router.php';
include 'Core/db.php';
//分发路由
router::run();
