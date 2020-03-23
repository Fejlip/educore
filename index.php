<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/src/loaders/login.php';
        break;
    case '/agenda' :
        require __DIR__ . '/src/loaders/agenda.php';
        break;
    case '/attendance' :
        require __DIR__ . '/src/loaders/attendance.php';
        break;
    case '/grades' :
        require __DIR__ . '/src/loaders/grades.php';
        break;
    case '/homework' :
        require __DIR__ . '/src/loaders/homework.php';
        break;
    case '/messages' :
        require __DIR__ . '/src/loaders/messages.php';
        break;
    case '/timetable' :
        require __DIR__ . '/src/loaders/timetable.php';
        break;
    case '/overview' :
        require __DIR__ . '/src/loaders/overview.php';
        break;
    case '/login-handler' :
        require __DIR__ . '/src/handlers/login.php';
        break;
    case '/logout-handler' :
        require __DIR__ . '/src/handlers/logout.php';
        break;        
    default:
        http_response_code(404);
        require __DIR__ . './src/loaders/login.php';
        break;
}
?>