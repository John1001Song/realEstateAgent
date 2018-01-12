<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    header('Content-Type: application/json');
}
// Routes
switch ($request_uri[0]) {
    case '/':
        require 'public/home.php';
        break;
    case '/blog':
        require 'public/blog.php';
        break;
    case '/contact':
        require 'public/contact.php';
        break;
    case '/about':
        require 'public/about.php';
        break;
    case '/support':
        require 'public/support.php';
        break;
    case '/send-email':
        require 'process/send-email-proc.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require 'public/error.php';
        break;
}