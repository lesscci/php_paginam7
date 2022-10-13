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

    
    if(!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['username'])){
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
            $email= $_REQUEST['email'];
            $password=$_REQUEST['password'];
            $username=$_REQUEST['username'];
            $passwordCrypt= password_hash($password,PASSWORD_DEFAULT);
            echo"aaaaaaaaa";

            $db=connectMysql($dsn,$dbuser,$dbpass);
            $stmt=$db->prepare("INSERT INTO USERS(username, email, password) VALUES(?,?,?)");
            $res = $stmt->execute(array($username, $email, $passwordCrypt));
            if($res){
                $_SESSION['user']['username']=$username;
                header('Location:?url=dashboard');
            }
            /*
            if(regis($db,$email,$password)){
                //true
                header('Location:?url=dashboard');
                echo"bbbbbbb";
            }
            */
            //echo"eeeeeee";
        }
        //echo "aaaa";
    }else{
        echo "mal";
    }