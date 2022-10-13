<?php
    //require 'src/render.php';
    //echo render ('logout');
    session_destroy();
    header('Location:?url=home');