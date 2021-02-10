<?

// export DATABASE_URL='postgres://postgres@localhost:5432/postgres'
echo "db file is here...";
function dbConnect(){
  $db = null;
  try
  {
    $dbUrl = getenv('DATABASE_URL');
  
    $dbOpts = parse_url($dbUrl);
 
    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  return $db;
}

function get_topics(){
    $db = dbConnect();

    $stmt = $db->query('select * from topic');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function displayTopicsAsCheckboxes(){
    $array = get_topics();
    foreach($array as $row){  ?>
<input type="checkbox" name="topics[]" id="topic_<? echo $row['id'] ?>" value="<? echo $row['id'] ?>">
<label for="topic_<? echo $row['id'] ?>">
    <? echo $row['name'] ?>
</label><br />
<?}
}

?>