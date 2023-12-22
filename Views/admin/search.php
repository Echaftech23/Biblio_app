<?php

use App\controllers\admin\BookController;
use App\Controllers\admin\ReservationController;

require_once "../../app/controllers/admin/BookController.php";

if (isset($_GET['search'])) {

    $book = new BookController();
    $booktitle = $_GET['search'];
    $book->filterBook($booktitle);
}
