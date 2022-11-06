<?php

session_start();

require_once(__DIR__ . '/../vendor/autoload.php');
require_once('functions.php');

loadConfig();

$session_key = getenv('SESSION_KEY');
$github_user_name = getenv('GITHUB_USER_NAME');

$user_data = getUserData($session_key, $github_user_name);