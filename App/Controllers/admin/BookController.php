<?php

namespace App\Controllers\admin;
 
use App\Models\Book;

require_once '../../vendor/autoload.php';

class BookController
{

    public function addBook($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies)
    {

        $book = new Book($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
        $result = $book->isBookDuplicate();

        if ($result !== false) {
            echo "Book already exists.";
        } else {
            $user1 = new Book($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
            $book_id = $user1->insertBook();

            if ($book_id !== false) {
                echo '<script>alert("added Successfully");</script>';
            } else {
                echo "Something went wrong";
            }
        }
    }

    public function showBooks(){
        $books = new Book(null, null, null, null, null, null, null);
        $result = $books->selectAll();
        return $result;
    }

    public function filterBook($booktitle)
    {
        $book = new Book(null, null, null, null, null, null, null);
        $books = $book->filterBook($booktitle);

        header('Content-Type: application/json');
        echo json_encode($books);
    }

    public function deleteBook($id)
    {

        $book = new Book(null, null, null, null, null, null, null);
        $result = $book->deleteBook($id);

        if (!$result) {
            echo '<script>alert("Deleted Successfully");</script>';
            header('Location: addBook.php');
        } else {
            echo '<script>alert("Something went wrong");</script>';
            header('Location:addBook.php');
        }
    }

}

if (isset($_POST['save'])) {

    $book = new BookController();
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $publicationYear = $_POST['publication_year'];
    $totalCopies = $_POST['total_copies'];
    $availableCopies = $_POST['available_copies'];
    $book->addBook($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
}