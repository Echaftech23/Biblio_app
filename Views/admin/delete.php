<?php

use App\controllers\admin\BookController; 
require_once "../../app/controllers/admin/BookController.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $deletebook = new BookController();
    $deletebook->deleteBook($id);
}