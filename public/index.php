<?php

use ThirdBridge\User;
use ThirdBridge\Service\UserService;

require_once __DIR__ . '../../vendor/autoload.php';

$userService = new UserService();

if (defined('STDIN')) {
    //var_dump($argv);
    $args = array();
    foreach ($argv as $arg) {
        if ($pos = strpos($arg, '=')) {
            $key = substr($arg, 0, $pos);
            $value = substr($arg, $pos+1);
            $args[$key] = $value;
        }
    }
    $ext = '';
    if (isset($args['input'])) {
        $path = $args['input'];
        $ext = pathinfo($args['input'], PATHINFO_EXTENSION);
    }

    if ($ext) {
        $users = $userService->processUsers($ext, $args['input']);
        if (isset($args['output'])) {
            $userService->writeFile($args['output'], $users);
        } else {
            fwrite(STDOUT,$users);
        }
    }
       
} 

