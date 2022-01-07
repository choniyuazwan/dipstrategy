<?php
    ob_start();
    
    require_once 'exam.php';

    $run = 'route';

    require_once $run.'.php';



    ob_end_flush();

