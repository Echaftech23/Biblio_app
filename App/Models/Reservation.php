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

            $sql = "INSERT INTO `reservations`(`reservation_date`, `return_date`, `user_id`, `book_id`) VALUES(:reservationDate, :returnDate, :userId, :bookId)";
            $stmt = $this->connexion->prepare($sql);

            $stmt->bindParam(":reservationDate", $this->reservationDate);
            $stmt->bindParam(":returnDate", $this->returnDate);
            $stmt->bindParam(":userId", $this->userId);
            $stmt->bindParam(":bookId", $this->bookId);
            $stmt->execute();

            $reservationId = $this->connexion->lastInsertId();

            return $reservationId;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // public function reservationExists()
    // {
    //     $stmt = $this->connexion->prepare("SELECT * FROM reservations WHERE user_id = :userId AND book_id = :bookId");
    //     $stmt->bindParam(":userId", $this->userId);
    //     $stmt->bindParam(":bookId", $this->bookId);
    //     $stmt->execute();

    //     return $stmt->fetchColumn() > 0;
    // }

    public function selectAllReservations()
    {
        $stmt = $this->connexion->prepare("SELECT * FROM reservations");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateReservation($id)
    {
        try {

            $sql = "UPDATE `reservations` SET `reservation_date` = :reservationDate, `return_date` = :returnDate WHERE `id` = :id";
            $stmt = $this->connexion->prepare($sql);

            $stmt->bindParam(":reservationDate", $this->reservationDate);
            $stmt->bindParam(":returnDate", $this->returnDate);
            $stmt->bindParam(":id", $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
      

    public function cancelReservation($id)
    {
        $stmt = $this->connexion->prepare("DELETE FROM reservations WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

}
