<?php
require_once("book-data.php");
$books = getBooks();
$book = [];
$_SESSION["Error"] = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["submitButton"])) {
        // muuda postitust
        $title = $_POST["title"];
        $_SESSION["title"] = $title;
        $grade = $_POST["grade"];
        $_SESSION["grade"] = $grade;
        $check = $_POST["isRead"];
        $_SESSION["isRead"] = $check;
        $originaltitle = $_POST["original-title"];
        $_SESSION["original-title"] = $originaltitle;
            if (strlen($title) > 23 or strlen($title) < 3) {
                if (isset($_SESSION["Error"])) {
                    $_SESSION["Error"] = "Pealkiri peab olema vahemikus 3-23 tähemärki.";

                }
            } else {
                editBook($originaltitle, $title, $grade, $check);
                header("Location: index.php");
            }
    } else {
        ($bookToDelete = $_POST["book-to-delete"]);
        deleteBook($bookToDelete);
        header("Location: index.php?Success=Raamat Eemaldatud!");
    }
} else {
    $title = $_GET["title"];
    $book = getBookByTitle($title);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lisa raamat</title>
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
<form method="post" action="edit-book.php">
<div id="author" class="addbook">
    <div class="label-div">
    <label for="title">Pealkiri:</label>
    </div>
    <div class="input-div">
            <input id="title" name="title" type="text" value="<?= $_SESSION["title"]; echo $book["title"] ?>">
        <input type="hidden" name="original-title" value="<?= $_SESSION["original-title"];echo $book["title"] ?>">
    </div>

    <!-- <br>
     <div class="label-div">
     <label for="author1">Autor 1:</label>
     </div>
     <div class="input-div">
     <select id="author1" name="author1">
         <option></option>
         <option>M. Raud</option>
         <option>J. R.R Tolkien</option>
     </select>
     </div>
     <br>
     <div class="label-div">
     <label for="author2">Autor 2:</label>
     </div>
     <div class="input-div">
      <select id="author2">
         <option></option>
         <option value="1">A. Kivirähk</option>
         <option value="1">J.K. Rowling</option>
     </select>
     </div>
-->
     <br>
     <div class="label-div">
     <label class="grade">Hinne:</label>
     </div>
     <div class="input-div">
     <label>
         <input id="grade" name="grade" type="radio" value=5 <? if  ($book["grade"] == 5 or $_SESSION["grade"] == 5) echo 'checked'?>>
    5
     </label>
     <label>
         <input name="grade" type="radio" value=4 <? if  ($book["grade"] == 4 or $_SESSION["grade"] == 4) echo 'checked'?>>
    4
     </label>
     <label>
         <input name="grade" type="radio" value=3 <? if  ($book["grade"] == 3 or $_SESSION["grade"] == 3) echo 'checked'?>>
    3
     </label>
     <label>
         <input name="grade" type="radio" value=2 <? if  ($book["grade"] == 2 or $_SESSION["grade"] == 2) echo 'checked'?>>
    2
     </label>
     <label>
         <input name="grade" type="radio" value=1 <? if  ($book["grade"] == 1 or $_SESSION["grade"] == 1) echo 'checked'?>>
    1
     </label>
     </div>
     <br>
     <div class="label-div">
         <label>
Loetud:
         <input name="isRead" type="checkbox" value="isRead" <? if ($book["isRead"] == "isRead" or $_SESSION["isRead"] == 'isRead') echo 'checked'?>>
         </label>
     </div>
     <br>
    <div class="input-div">
    <input type="hidden" name="book-to-delete" value="<?= $book["title"]?>"/>
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