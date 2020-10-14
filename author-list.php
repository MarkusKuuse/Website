<?php
    require_once("author-data.php");
    $authors = getAuthors()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autorid</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <a class="nav-link" href="index.php" id="book-list-link">Raamatud</a>
        <a class="nav-link" href="author-list.php" id="author-list-link">Autorid</a>
        <a class="nav-link" href="add-book.php" id="book-form-link">Lisa raamat</a>
        <a class="nav-link" href="add-author.php" id="author-form-link">Lisa autor</a>
    </nav>
    <div class="success" id="message-block">
    <?php echo $_GET['Success'];
    ?>
    </div>

    <div id="list" class="list">
    <div class="header-firstname">Nimi</div>
    <div class="header-lastname">Perekonnanimi</div>
    <div class="header-grade">Hinne</div>
    <div class="break"></div>
    <?php foreach ($authors as $author): ?>
    <div id="authors" class="authors">
        <div class="firstname"><a href="edit-author.php?author=<?= $author["firstName"]?>"><?= $author["firstName"] . PHP_EOL ?></a></div>
        <div class="lastname"><?= $author["lastName"] . PHP_EOL ?></div>
        <div class="grade"><?= $author["grade"] . PHP_EOL ?></div>
    </div>
    <?php endforeach; ?>
</div>

<footer>
    <a class="footer-txt">Info:</a>
</footer>
</body>
</html>