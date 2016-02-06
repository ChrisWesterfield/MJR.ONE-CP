<?php


    setcookie('MJRProfiler','no',time()+3600,'/',$_SERVER['SERVER_NAME']);

    Header('location: https://'.$_SERVER['SERVER_NAME'].'/app_dev.php/');