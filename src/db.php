<?php
    function connectSqlite(string $dbname){
        try{
            //DIR --> directorio actual
        $db=new PDO('sqlite:'.__DIR__.'/database/'.$dbname.'.sqlite');
        //Con esto conseguimos q nos enseñe los errores
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
             }catch(PDOException $e){
                die($e->getMessage());
                 }
                    return $db;
    }

    function connectMysql(string $dsn,string $dbuser,string $dbpass){
        try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            }catch(PDOException $e){
            die( $e->getMessage());
            }
                return $db;
    }

    function auth(PDO $db, string $email, string $password):bool
    {
        $stmt=$db->prepare("SELECT * FROM USERS WHERE email=:email LIMIT 1");
        $res=$stmt->execute([':email'=>$email]);
        if($stmt->rowCount()==1){
            $user=$stmt->fetchAll()[0];
            //var_dump($user);
            //die($password,$user->$password);
            if(password_verify($password, $user->password)){
                //login correcte
                //die($user->password);
                $_SESSION['user']=$user;
                //header('Location:?url=dashboard');
                //echo "pppppppppppp";
                return true;
            }
            //return true;
        }
        return false;
    /*
    var_dump($stmt);
    die;
    if($stmt->execute([':email'=>$email])){
        $row=$stmt->fetchAll();
        var_dump($row);
        die();
    }else{
        return false;
    }
    */
}

function regis(PDO $db, string $email, string $password):bool
{
    $stmt=$db->prepare("INSERT INTO USERS LIMIT 1");
    //var_dump($stmt);
    //$res=$stmt->execute([':email'=>$email]);
    /*
    if($stmt->rowCount()==1){
        $user=$stmt->fetchAll()[0];
        if(password_verify($password, $user->password)){
            $_SESSION['user']=$user;
            return true;
        }
    }
    */
    return false;
}