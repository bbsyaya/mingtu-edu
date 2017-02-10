<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE' => true,     //ThinkPHP调试

    /* 数据库设置 */
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'lx',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PORT' => '3306',        // 端口
    'DB_PREFIX' => 'lx_',    // 数据库表前缀
    //项目分组
    'MODULE_ALLOW_LIST' => array('Home', 'Admin'),
    'DEFAULT_MODULE' => 'Home',
);