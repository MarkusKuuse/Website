<?php
require_once("author-data.php");
$authors = getAuthors();

$author = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submitButton"])) {
        // muuda postitust
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $grade = $_POST["grade"];
        $originalName = $_POST["original-name"];
        $originalLastName = $_POST["original-lastname"];
        editAuthor($originalName, $originalLastName, $firstName, $lastName, $grade);
        header("Location: author-list.php");
    } else {
        ($authorToDelete = $_POST["author-to-delete"]);
        deleteAuthor($authorToDelete);
        header("Location: author-list.php");
    }
} else {
    $firstName = $_GET["firstName"];
    $author = getAuthorByName($firstName);
    echo($firstName);
}
echo($firstName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lisa autor </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a class="nav-link" href="index.php" id="book-list-link">Raamatud</a>
        <a class="nav-link" href="author-list.php" id="author-list-link">Autorid</a>
        <a class="nav-link" href="add-book.html" id="book-form-link">Lisa raamat</a>
        <a class="nav-link" href="add-author.html" id="author-form-link">Lisa autor</a>
    </nav>

<form method="post" action="edit-author.php">
<div id="author" class="addbook">
    <div class="label-div">
    <label class="authorname" for="firstName">Eesnimi:</label>
    </div>
    <div class="input-div">
        <input id="firstName" name="firstName" type="text" value="<?= $author["firstName"] ?>">
        <input type="hidden" name="original-name" value="<?= $author["firstName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="authorname" for="lastName">Perekonnanimi:</label>
    </div>
    <div class="input-div">
        <input id="lastName" name="lastName" type="text" value="<?= $author["lastName"] ?>">
        <input type="hidden" name="original-lastname" value="<?= $author["lastName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="grade">Hinne:</label>
    </div>
    <div class="input-div">
    <label>
        <input name="grade" type="radio" value="5/5">
    5
    </label>
    <label>
        <input name="grade" type="radio" value="4/5">
    4
    </label>
    <label>
        <input name="grade" type="radio" value="3/5">
    3
    </label>
    <label>
        <input name="grade" type="radio" value="2/5">
    2
    </label>
    <label>
        <input name="grade" type="radio" value="1/5">
    1
    </label>
    <br>
    </div>
        <div class="input-div">
            <input type="hidden" name="author-to-delete" value="<?= $author["firstName"]?>"/>
            <input type="submit" id="delete" name="deleteButton" value="Delete"/>
            <label class="save">
                <input name="submitButton" type="submit" value="Change">
    </label>
    </div>
</div>
</form>
<footer>
    <a class="footer-txt">Info:</a>
</footer>
</body>
</html>