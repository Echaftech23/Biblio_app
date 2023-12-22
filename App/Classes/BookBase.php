<?php

namespace App\Classes;

class BookBase
{

    protected $title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies;
    public function __construct($title, $author, $genre, $description, $publicationYear, $totalCopies, $availableCopies)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setGenre($genre);
        $this->setDescription($description);
        $this->setPublicationYear($publicationYear);
        $this->setTotalCopies($totalCopies);
        $this->setAvailableCopies($availableCopies);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPublicationYear()
    {
        return $this->publicationYear;
    }

    public function getTotalCopies()
    {
        return $this->totalCopies;
    }

    public function getAvailableCopies()
    {
        return $this->availableCopies;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPublicationYear($publicationYear)
    {
        $this->publicationYear = $publicationYear;
    }

    public function setTotalCopies($totalCopies)
    {
        $this->totalCopies = $totalCopies;
    }

    public function setAvailableCopies($availableCopies)
    {
        $this->availableCopies = $availableCopies;
    }
}
