<?php
const bookList = "book";

function getBooks() {
    $lines = file(bookList);
    $books = [];

    foreach ($lines as $line) {
        list($title, $author, $grade, $check) = explode(";", $line);
        $books[] = ["title" => urldecode($title), "author" => urldecode($author), "grade" => $grade, "isRead" => $check ];

    }
    return $books;
}

function addBooks($title, $author, $grade, $check) {
    $line = urlencode($title) . ";"  . "TBA" . ";" . $grade . PHP_EOL;
    file_put_contents(bookList, $line, FILE_APPEND);
}

function deleteBook($title) {
    $books = getBooks();
    $data = "";

    foreach ($books as $book) {
        if ($book["title"] !== $title) {
            $data = $data . urlencode($book["title"]) . ";" . "TBA" . ";" . $book["grade"];
        }
    }
    file_put_contents(bookList, $data);
}
function getBookByTitle($title) {
    $books = getBooks();

    foreach ($books as $book) {
        if ($book["title"] === $title) {
            return $book;
        }
    }
    return null;

}
function editBook($originaltitle, $title, $grade) {
    $books = getBooks();
    $data = "";

    foreach ($books as $book) {
        if ($book["title"] === $originaltitle) {
            $book["title"] = $title;
            $book["grade"] = $grade;
        }
        $data = $data . urlencode($book["title"]) . ";" . "TBA" . ";" . $book["grade"];
        }
    file_put_contents(bookList, $data);
}