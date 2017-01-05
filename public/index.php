<?php

use ThirdBridge\User;
use ThirdBridge\Service\UserService;

require_once __DIR__ . '../../vendor/autoload.php';

$userService = new UserService();

if (defined('STDIN')) {    
    $args = array();
    foreach ($argv as $arg) {
        if ($pos = strpos($arg, '=')) {
            $key = substr($arg, 0, $pos);
            $value = substr($arg, $pos+1);
            $args[$key] = $value;
        }
    }

    $ext = '';
    $path = '';
    if (isset($args['input'])) {
        $ext = pathinfo($args['input'], PATHINFO_EXTENSION);
        $path = $args['input'];
    } else if(isset($argv[1])) {
        $ext = pathinfo($argv[1], PATHINFO_EXTENSION);
        $path = $argv[1];
    }

    if ($ext) {
        $users = $userService->processUsers($ext, $path);
        if (isset($args['output'])) {
            $userService->writeFile($args['output'], $users);
        } else {
            fwrite(STDOUT,$users);
        }
    }
       
} 

