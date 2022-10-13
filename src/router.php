<?php
    include 'routes.php';
/**
 * Undocumented function
 *
 * @return void
 */
    function getRoute(array $routes):string{
        if(isset($_REQUEST['url'])){
            $url=$_REQUEST['url'];
        }else{
            $url='home';
        }

        if(in_array($url,(array)$routes)){
            return $url;
        }else{
            return 'error';
        }
    }