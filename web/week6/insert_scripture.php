<?php
require('db.php');
$db = dbConnect();
$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topics = $_POST['topics'];

$sql = "INSERT INTO scriptures(book, chapter, verse, content) VALUES ('$book', '$chapter', '$verse', '$content')";
$stmt =  $db->query($sql);
$stmt->exec();

?>