<?php
require 'ClassAutoLoad.php';
$ObjLayout->header($conf);
$ObjLayout->navbar($conf);
$ObjLayout->banner($conf);
$ObjLayout->form_frame($conf, $ObjForm, $ObjFncs);
$ObjLayout->footer($conf);