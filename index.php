<?php
    session_start();
    include_once 'includes/db.php';
    $route = $_GET['route'] ?? $_GET['route']='main';
    include_once 'includes/functions.php';
    include_once 'includes/header.php';
    include_once 'includes/aside.php';
    include_once "page/$route.php";
    include_once 'includes/footer.php';
