<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8435"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    

  $sql = "insert into public.contact(name,email,subject,message)values('".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."')";

  
  $ret = pg_query($dbconn, $sql);
  if($ret){
  
   
          echo "Data saved Successfully";
  }else{
      
          echo "Soething Went Wrong";
  }
}

?>