<?php
require_once("author-data.php");
$_SESSION["Error"] = "";
if (isset($_POST["submitButton"])) {
    $firstName = $_POST["firstName"];
    $_SESSION["firstName"] = $firstName;
    $lastName = $_POST["lastName"];
    $_SESSION["lastName"] = $lastName;
    $grade = $_POST["grade"];
    $_SESSION["grade"] = $grade;
    if (strlen($firstName) > 21 or strlen($firstName) < 1 or strlen($lastName) > 22 or strlen($lastName) < 2) {
        if (isset($_SESSION["Error"])) {
            $_SESSION["Error"] = "Nimiel peab olema 1-21 ja perekonnanimel peab olema vahemikus 3-23 tähemärki.";
        }
    } else {
        addAuthor($firstName, $lastName, $grade);
        header("Location: author-list.php");

    }
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
    <form action="add-author.php" method="post" >
<div id="author" class="addauthor">
    <div class="label-div">
    <label class="authorname" for="firstName">Eesnimi:</label>
    </div>
    <div class="input-div">
        <input id="firstName" name="firstName" type="text" value="<?= $_SESSION["firstName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="authorname" for="lastName">Perekonnanimi:</label>
    </div>
    <div class="input-div">
        <input id="lastName" name="lastName" type="text" value="<? $_SESSION["lastName"] ?>">
    </div>
    <br>
    <div class="label-div">
    <label class="grade">Hinne:</label>
    </div>
    <div class="input-div">
    <label>
        <input name="grade" type="radio" value=5 <? if ($_SESSION["grade"] == 5) echo "checked" ?>>
        5
    </label>
    <label>
        <input name="grade" type="radio" value=4 <? if ($_SESSION["grade"] == 4) echo "checked" ?>>
        4
    </label>
    <label>
        <input name="grade" type="radio" value=3 <? if ($_SESSION["grade"] == 3) echo "checked" ?>>
        3
    </label>
    <label>
        <input name="grade" type="radio" value=2 <? if ($_SESSION["grade"] == 2) echo "checked" ?>>
        2
    </label>
    <label>
        <input name="grade" type="radio" value=1 <? if ($_SESSION["grade"] == 1) echo "checked" ?>>
        1
    </label>
    <br>
    </div>
        <div class="input-div">
    <label class="save">
        <input name="submitButton" type="submit" value="Submit">
    </label>
    </div>
</div>
    </form>
<footer>
    <a class="footer-txt">Info:</a>
</footer>
</body>
</html>