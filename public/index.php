<?php
    // Composer autoloader
    require_once(__DIR__ . '/../vendor/autoload.php');

    // Load environment variables defined in .evn
    $dotenv = \Dotenv\Dotenv::create(__DIR__ . '/../');
    $dotenv->load();