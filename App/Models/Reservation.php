<?php

namespace App\Models;

use App\DataBase\Connection;
use App\Classes\ReservationBase;
use PDO;
use PDOException;

class Reservation extends ReservationBase
{

    private $connexion;
    public function __construct($reservationDate, $returnDate, $userId, $bookId)
    {
        $this->connexion = Connection::dbConnect();
        parent::__construct($reservationDate, $returnDate, $userId, $bookId);
    }

    public function createReservation()
    {
        try {
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO `reservations`(`reservation_date`, `return_date`, `user_id`, `book_id`) VALUES(:reservationDate, :returnDate, :userId, :bookId)";
            $stmt = $this->connexion->prepare($sql);

            $stmt->bindParam(":reservationDate", $this->reservationDate, PDO::PARAM_STR);
            $stmt->bindParam(":returnDate", $this->returnDate, PDO::PARAM_STR);
            $stmt->bindParam(":userId", $this->userId, PDO::PARAM_INT);
            $stmt->bindParam(":bookId", $this->bookId, PDO::PARAM_INT);

            $stmt->execute();

            $reservationId = $this->connexion->lastInsertId();

            return $reservationId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function isReservationDuplicate()
    {
        $stmt = $this->connexion->prepare("SELECT * FROM reservations WHERE user_id = :userId AND book_id = :bookId");
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":bookId", $this->bookId);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    public function selectAllReservations()
    {
        $stmt = $this->connexion->prepare("SELECT * FROM reservations");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteReservation($id)
    {
        $stmt = $this->connexion->prepare("DELETE FROM reservations WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

}
