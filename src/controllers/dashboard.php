<?php
    require 'src/render.php';
    $title="Dashboard";
    
    echo render('home',['title'=>$title]);