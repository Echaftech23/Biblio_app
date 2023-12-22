<?php

use App\controllers\admin\BookController;
use App\Controllers\admin\ReservationController;

require_once "../../app/controllers/admin/BookController.php";

if (isset($_GET["book_id"])) {
    $id = $_GET["book_id"];

    $deletebook = new BookController();
    $deletebook->deleteBook($id);
}

if (isset($_GET["reservation_id"])) {
    $id = $_GET["reservation_id"];

    $deletebook = new ReservationController();
    $deletebook->cancelReservation($id);
}