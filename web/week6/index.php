<?php
require('../week5/connections.php');

function get_topics(){
    $db = connect();

    $stmt = $db->query('select * from topics');
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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<style>
form {
    width: 500px;
    margin: 150px auto;
    border: 1px solid black;
    border-radius: 3px;
    padding: 30px;
}
</style>

<body>
    <form method="post" action="insert_scripture.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Book</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="book" aria-describedby="emailHelp"
                placeholder="Book">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Chapter</label>
            <input type="text" class="form-control" name="chapter" id="exampleInputPassword1" placeholder="Chapter">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Verse</label>
            <input type="text" class="form-control" name="verse" id="exampleInputPassword1" placeholder="Verse">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea type="text" class="form-control" name="content" id="exampleInputPassword1"
                placeholder="Verse"> </textarea>
        </div>
        <?php displayTopicsAsCheckboxes(); ?>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>