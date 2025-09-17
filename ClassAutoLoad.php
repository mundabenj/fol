<?php
require 'conf.php';

$directory = array("Global", "Layouts", "Forms", "Proc");

spl_autoload_register(function ($class_name) use ($directory) {
    foreach ($directory as $dir) {
        if (file_exists($dir . '/' . $class_name . '.php')) {
            require $dir . '/' . $class_name . '.php';
        }
    }
});

// Now you can create instances of classes without manually including their files
$ObjSendMail = new SendMail();
$ObjLayout = new layouts();
$ObjForm = new forms();
$ObjAuth = new auth();
$ObjFncs = new fncs();


$ObjAuth->signup($conf, $ObjFncs, $lang, $ObjSendMail);