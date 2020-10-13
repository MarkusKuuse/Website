<?php
const authorList = "authors";

function getAuthors() {
    $lines = file(authorList);
    $authors = [];

    foreach ($lines as $line) {
        list($firstName, $lastName, $grade) = explode(";", $line);
        $authors[] = ["firstName" => urldecode($firstName), "lastName" => urldecode($lastName), "grade" => $grade];

    }
    return $authors;
}

function addAuthor($firstName, $lastName, $grade) {
    $line = urlencode($firstName) . ";" . urlencode($lastName) . ";" . $grade . PHP_EOL;
    file_put_contents(authorList, $line, FILE_APPEND);
}

function deleteAuthor($firstName) {
    $authors = getAuthors();
    $data = "";

    foreach ($authors as $author) {
        if ($author["firstName"] !== $firstName) {
            $data = $data . urlencode($author["firstName"]) . ";" . urlencode($author["lastName"]) . ";" . $author["grade"];
        }
    }
    file_put_contents(authorList, $data);
}
function getAuthorByName($firstName) {
    $authors = getAuthors();

    foreach ($authors as $author) {
        if ($author["firstName"] === $firstName) {
            return $author;
        }
    }
    return null;

}
function editAuthor($originalName, $originalLastName, $firstName, $lastName, $grade) {
    $authors = getAuthors();
    $data = "";

    foreach ($authors as $author) {
        if ($author["firstName"] === $originalName) {
            $author["firstName"] = $firstName;
            $author["lastName"] = $lastName;
            $author["grade"] = $grade;
        }
        $data = $data . urlencode($author["firstName"]) . ";" . urlencode($author["lastName"]) . ";" . $author["grade"];
        }
    file_put_contents(authorList, $data);
}