<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8435"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
  
    $sql = "insert into public.users(email,password,username)values('".$_POST['email']."','".md5($_POST['password'])."','".$_POST['user']."')";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
        header('Location: index.html');
    }else{
            echo $sql;
        
          
    }
}

?>