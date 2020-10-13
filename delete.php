<?php

    require_once("book-data.php");

    $bookToDelete = $_POST["book-to-delete"];
    deleteBook($bookToDelete);

    header("location: index.php");