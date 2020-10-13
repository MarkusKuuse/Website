<?php
    require_once("book-data.php");
    $books = getBooks()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raamatud</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <a class="nav-link" href="index.php" id="book-list-link">Raamatud</a>
    <a class="nav-link" href="author-list.php" id="author-list-link">Autorid</a>
    <a class="nav-link" href="add-book.html" id="book-form-link">Lisa raamat</a>
    <a class="nav-link" href="add-author.html" id="author-form-link">Lisa autor</a>
</nav>

<div id="list" class="list">
    <div class="header-book">Pealkiri</div>
    <div class="header-author">Autorid</div>
    <div class="header-grade">Hinne</div>
    <div class="break"></div>

    <?php foreach ($books as $book): ?>
    <div id="books" class="books">
        <div class="book"><a href="edit-book.php?title=<?= $book["title"] ?>"><?= $book["title"] . PHP_EOL ?></a></div>
        <div class="author"><?= $book["author"] . PHP_EOL ?></div>
        <div class="grade"><?= $book["grade"] . PHP_EOL ?></div>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    <a class="footer-txt">Info:</a>
</footer>
</body>
</html>