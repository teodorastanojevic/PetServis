<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ServisiController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {


    case 'login':
        (new AuthController())->login();
        break;

    case 'register':
        (new AuthController())->register();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;


    case 'prijava-ljubimca':
        (new ServisiController())->prijavaLjubimca();
        break;

    case 'moje-prijave':
        (new ServisiController())->userList();
        break;


    case 'admin-ljubimci':
        (new ServisiController())->adminList();
        break;

    case 'izmeni-status':
        (new ServisiController())->azurirajStatus();
        break;

    case 'statistika':
        (new ServisiController())->statistika();
        break;


    default:
        (new HomeController())->index();
        break;
}
