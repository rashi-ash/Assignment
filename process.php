<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8435"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
    $hashpassword = md5($_POST['password']);

     $sql ="select *from public.users where username = '".pg_escape_string($_POST['user'])."' and password ='".$hashpassword."'";
  
    $data = pg_query($dbconn,$sql); 
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        
        header('Location: index.html');    
       
    }else{
        
        echo "Invalid Details";
    }
}

?>