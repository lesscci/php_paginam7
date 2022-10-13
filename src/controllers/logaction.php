<?php
    require 'src/db.php';
    //agafa $_request[email] i pass
    //comprova si existeixen a la base de datos
    // tenim dos possib
    //1.Existen => dashboard y abrimos sesion usuario
    //2.no exis => pal home o nos quedamos en login
    //echo "aaaa";

    //die($dsn);
    $db=connectMysql($dsn,$dbuser,$dbpass);
    
    if(!empty($_POST['email'])&&!empty($_POST['password'])){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email= $_REQUEST['email'];
            //die($email);
            $password=$_REQUEST['password'];
            echo"aaaaaaaaa";
            
            if(auth($db,$email,$password)){
                //true
                header('Location:?url=dashboard');
                echo"bbbbbbb";
            }else{
                //false
                header('Location:?url=login');
                echo"cccccc";
            }
            
            echo"eeeeeee";
        }
        //echo "aaaa";
    }