<?php 

function connect() {
    try
    {
      $dbUrl = getenv('DATABASE_URL');
    
      $dbOpts = parse_url($dbUrl);
    
      // $dbHost = "ec2-54-157-149-88.compute-1.amazonaws.com";
      // $dbPort = 5432;
      // $dbUser = "dcacwdhlggpnbk";
      // $dbPassword = "9a17c9dd9d1c7e4cbe502c410b417a7e4d8ecd8575cf009689782b583cd9e108";
      // $dbName = "dcqs6q3ko4ukcr";
      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');
      $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword, $options);
    
      return $db;
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }
}

?>