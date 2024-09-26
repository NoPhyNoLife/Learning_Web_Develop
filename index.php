<?php

// 主页请求处理
if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.html') {
    require_once('index.html');
    exit;
}

// 处理未知请求
http_response_code(404);
echo '404 Not Found';
echo '听不懂你在说什么喵···'

?>
