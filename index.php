<?php
/**
 * Created by PhpStorm.
 * User: JasonVon
 * Date: 2016/3/20
 * Time: 16:17
 */

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define("APP_NAME", "Index");
define("APP_PATH", "./Index/");
define("APP_DEBUG", true);
$tmp = 'http://localhost:8088/england';
define("DEFAULT_HOME",$tmp);
session_start();
//默认是中文
if (!isset($_SESSION['flag'])) {
    $_SESSION['flag'] = 0;
}
require './ThinkPHP/ThinkPHP.php';