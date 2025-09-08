<?php
require 'ClassAutoLoad.php';
$layout->header($conf);
$layout->nav($conf);
$layout->banner($conf);
$layout->form_frame($conf, $forms);
$layout->footer($conf);