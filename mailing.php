<?php

require  'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => 'Alex Mundama',
    'mail_from' => 'BMundama@strathmore.edu',
    'name_to' => 'Mazziq Studios',
    'mail_to' => 'mazziqstudios@gmail.com',
    'subject' => 'Welcome to ICS Academy',
    'body' => 'This is a new semester, <b>let\'s make it great!</b>'
];

$ObjSendMail->Send_Mail($conf, $mailCnt);

