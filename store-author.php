<?php

    require_once("author-data.php");
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $grade = $_POST["grade"];

    addAuthor($firstName, $lastName, $grade);

    header("Location: author-list.php");