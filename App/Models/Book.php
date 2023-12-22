<?php

namespace App\Models;

use App\DataBase\Connection;
use App\Classes\BookBase;
use PDO;

class Book extends BookBase
{

    private $connexion;
    public function __construct($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies)
    {
        $this->connexion = Connection::dbConnect();
        parent::__construct($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies);
    }

    public function insertBook()
    {
        $stmt = $this->connexion->prepare("
            INSERT INTO books (title, author, genre, description, publication_year, total_copies, available_copies)
            VALUES (:title, :author, :genre, :description, :publicationYear, :totalCopies, :availableCopies)
        ");

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":publicationYear", $this->publicationYear);
        $stmt->bindParam(":totalCopies", $this->totalCopies);
        $stmt->bindParam(":availableCopies", $this->availableCopies);

        $stmt->execute();

        $user_id = $this->connexion->lastInsertId();

        return $user_id;
    }

    public function isBookDuplicate()
    {
        $stmt = $this->connexion->prepare("SELECT * FROM books WHERE title = :title AND author = :author");
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function selectAll()
    {
        $stmt = $this->connexion->prepare("SELECT * FROM books");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function filterBook($booktitle){
        $booktitle = '%' . $booktitle . '%';

        $stmt = $this->connexion->prepare("SELECT * FROM books WHERE title LIKE :title");
        $stmt->bindParam(":title", $booktitle);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }

    public function deleteBook($id)
    {
        $stmt = $this->connexion->prepare("DELETE FROM books WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

}
