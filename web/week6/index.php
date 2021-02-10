<?
  require('./db.php');
  if(!empty($_POST)){
    print_r($_POST);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W06 assignment</title>
</head>

<body>
    <form method="post">
        <label for="book">Book: </label><br />
        <input type="text" name="book" id="book" placeholder="Book"><br />
        <label for="chapter">Chapter: </label><br />
        <input type="text" name="chapter" id="chapter" placeholder="Chapter"><br />
        <label for="verse">Verse: </label><br />
        <input type="text" name="verse" id="verse" placeholder="Verse"><br />
        <label for="content">Content: </label><br />
        <textarea name="content" id="content" cols="30" rows="10" style="resize: none;"
            placeholder="Content"></textarea><br />
        <?php
        displayTopicsAsCheckboxes();
    ?>
        <input type="submit" value="submit">
    </form>
</body>

</html>