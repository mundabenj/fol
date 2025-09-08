<?php
require 'ClassAutoLoad.php';
$ObjLayout->header($conf);
$ObjLayout->nav($conf);
$ObjLayout->banner($conf);
$ObjLayout->form_frame($conf, $ObjForm);
$ObjLayout->footer($conf);