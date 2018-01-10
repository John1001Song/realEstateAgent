<?php
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

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
    default:
        header('HTTP/1.0 404 Not Found');
        require 'public/error.php';
        break;
}