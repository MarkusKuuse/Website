<?php
require_once("author-data.php");
$authors = getAuthors();
$author = [];
$_SESSION["Error"] = "";
$_SESSION["success"] = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["submitButton"])) {
        // muuda postitust
        $firstName = $_POST["firstName"];
        $_SESSION["firstName"] = $firstName;
        $lastName = $_POST["lastName"];
        $_SESSION["lastName"] = $lastName;
        $grade = $_POST["grade"];
        $_SESSION["grade"] = $grade;
        $originalName = $_POST["original-name"];
        $_SESSION["original-name"] = $originalName;
        $originalLastName = $_POST["original-lastname"];
        $_SESSION["original-lastname"] = $originalLastName;
        if (strlen($firstName) > 21 or strlen($firstName) < 1 or strlen($lastName) > 22 or strlen($lastName) < 2) {
            if (isset($_SESSION["Error"])) {
                $_SESSION["Error"] = "Nimi ja perekonnanimi peab olema vahemikus 3-23 tähemärki";
            }
        } else {
            editAuthor($originalName, $originalLastName, $firstName, $lastName, $grade);
            header("Location: author-list.php");
        }
    } else {
        ($authorToDelete = $_POST["author-to-delete"]);
        deleteAuthor($authorToDelete);
        header("Location: author-list.php?Success=Autor Eemaldatud!");
    }
} else {
    $firstName = $_GET["author"];
    $author = getAuthorByName($firstName);
}
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
        <a class="nav-link" href="add-book.php" id="book-form-link">Lisa raamat</a>
        <a class="nav-link" href="add-author.php" id="author-form-link">Lisa autor</a>
    </nav>
    <div class="errors" id="error-block">
        <?
        echo $_SESSION["Error"];
        ?>
    </div>
<form method="post" action="edit-author.php">
<div id="author" class="addbook">
    <div class="label-div">
    <label class="authorname" for="firstName">Eesnimi:</label>
    </div>
    <div class="input-div">
            <input id="firstName" name="firstName" type="text" value="<?= $_SESSION["firstName"]; echo $author["firstName"] ?>">
        <input type="hidden" name="original-name" value="<?= $_SESSION["original-name"]; echo $author["firstName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="authorname" for="lastName">Perekonnanimi:</label>
    </div>
    <div class="input-div">
        <input id="lastName" name="lastName" type="text" value="<?= $_SESSION["lastName"]; echo $author["lastName"] ?>">
        <input type="hidden" name="original-lastname" value="<?= $_SESSION["original-lastname"]; echo $author["lastName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="grade">Hinne:</label>
    </div>
    <div class="input-div">
    <label>
        <input name="grade" type="radio" value=5 <? if  ($author["grade"] == 5 or $_SESSION["grade"] == 5) echo "checked"?>>
    5
    </label>
    <label>
        <input name="grade" type="radio" value=4 <? if  ($author["grade"] == 4 or $_SESSION["grade"] == 4) echo "checked"?>>
    4
    </label>
    <label>
        <input name="grade" type="radio" value=3 <? if  ($author["grade"] == 3 or $_SESSION["grade"] == 3) echo "checked"?>>
    3
    </label>
    <label>
        <input name="grade" type="radio" value=2 <? if  ($author["grade"] == 2 or $_SESSION["grade"] == 2) echo "checked"?>>
    2
    </label>
    <label>
        <input name="grade" type="radio" value=1 <? if  ($author["grade"] == 1 or $_SESSION["grade"] == 1) echo "checked"?>>
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