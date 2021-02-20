<?php 

// function connect() {
//     try
//     {
//       $dbUrl = getenv('DATABASE_URL');
    
//       $dbOpts = parse_url($dbUrl);
    
//       $dbHost = $dbOpts["host"];
//       $dbPort = $dbOpts["port"];
//       $dbUser = $dbOpts["user"];
//       $dbPassword = $dbOpts["pass"];
//       $dbName = ltrim($dbOpts["path"],'/');
//       $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
//       $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword, $options);
    
//       return $db;
//     }
//     catch (PDOException $ex)
//     {
//       echo 'Error!: ' . $ex->getMessage();
//       die();
//     }
// }

function connect(){
  $server = 'localhost';
  $dbname= 'shop';
  $username = 'ramalaso';
  $password = 'ramalaso'; 
  $dsn = "mysql:host=$server;dbname=$dbname";
  $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
 
  // Create the actual connection object and assign it to a variable
  try {
   $link = new PDO($dsn, $username, $password, $options);
  //  return $link;
      if(is_object($link)){
          return $link;
      }
  } catch(PDOException $e) {
      // echo "It didnt work, error: ". $e->getMessage(); 
      header('Location: /view/500.php');
      exit;
  }
 }

?>