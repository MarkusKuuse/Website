<?php
    require_once("book-data.php");
    $title = $_POST["title"];
    $author = $_POST["author"];
    $grade = $_POST["grade"];
    $check = $_POST["isRead"];

    addBooks($title, $author, $grade, $check);
    header("Location: index.php");
