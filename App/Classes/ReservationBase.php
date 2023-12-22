<?php

namespace App\Classes;

class ReservationBase
{

    protected $reservationDate, $returnDate, $userId, $bookId;

    public function __construct($reservationDate, $returnDate, $userId, $bookId)
    {
        $this->setReservationDate($reservationDate);
        $this->setReturnDate($returnDate);
        $this->setUserId($userId);
        $this->setBookId($bookId);
    }

    public function getReservationDate()
    {
        return $this->reservationDate;
    }

    public function getReturnDate()
    {
        return $this->returnDate;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function setReservationDate($reservationDate)
    {
        $this->reservationDate = $reservationDate;
    }

    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }
}
