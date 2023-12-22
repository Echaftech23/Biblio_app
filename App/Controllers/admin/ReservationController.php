<?php

namespace App\Controllers\admin;

use App\Models\Reservation, PDOException;

require_once __DIR__ . '/../../../vendor/autoload.php';

class ReservationController
{

    public function createReservation($reservationDate, $returnDate, $userId, $bookId)
    {
        $reservation = new Reservation($reservationDate, $returnDate, $userId, $bookId);
        $reservationId = $reservation->createReservation();

        if ($reservationId !== false) {
            echo '<script>alert("Reservation added Successfully");</script>';
            header('Location: ../../../Views/admin/addReservation.php');
        } else {
            echo "Something went wrong";
        }
    }

    public function updateReservation($id)
    {
        try {
            $reservation = new Reservation(null, null, null, null);
            $result = $reservation->updateReservation($id);

            echo '<script>alert("Reservation Updated Successfully");</script>';
            header('Location: addReservation.php');
        } catch (PDOException $e) {
            echo '<script>alert("Error updating reservation or reservation does not exist");</script>';
        }
    }

    public function showReservations()
    {
        $reservations = new Reservation(null, null, null, null);
        $result = $reservations->selectAllReservations();
        return $result;
    }

    public function cancelReservation($id)
    {
        try {
            $reservation = new Reservation(null, null, null, null);
            $result = $reservation->cancelReservation($id);

            if (!$result) {
                echo '<script>alert("Reservation canceled Successfully");</script>';
                header('Location: addReservation.php');
            } else {
                echo '<script>alert("Something went wrong");</script>';
                header('Location:addReservation.php');
            }
        } catch (PDOException $e) {
            echo '<script>alert("Error canceling your reservation");</script>';
        }
    }
}

if (isset($_POST['save'])) {
    $userLogin = new ReservationController();
    $userLogin->createReservation(
                                date('Y/m/d'), $_POST['return_date'],
                                $_POST['user_id'], $_POST['book_id']);    
}