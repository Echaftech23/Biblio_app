<?php

use App\Controllers\admin\ReservationController;

require_once "../../app/controllers/admin/ReservationController.php";

$reservationController = new ReservationController();
$reservations = $reservationController->showReservations();

include('../../includes/admin/header.php');
?>

<!-- Sidebar  -->
<?php include("../../includes/sidebar.php") ?>

<div id="content">

    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                    <span class="material-icons">arrow_back_ios</span>
                </button>

                <a class="navbar-brand" href="#"> Books </a>

                <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="material-icons">more_vert</span>
                </button>

                <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown nav-item active">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <span class="material-icons">notifications</span>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">You have 5 new messages</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Mike</a>
                                </li>
                                <li>
                                    <a href="#">Wish Mary on her birthday!</a>
                                </li>
                                <li>
                                    <a href="#">5 warnings in Server Console</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">apps</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">person</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="material-icons">settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="main-content">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card" style="min-height: 485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Reservations Stats</h4>
                        <p class="category">New Reservation on 20th December, 2023</p>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalReservation">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalReservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <!-- ... (similar to the BookController part) -->
                    </div>

                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Reservation Date</th>
                                    <th>Return Date</th>
                                    <th>Is Returned</th>
                                    <th>User ID</th>
                                    <th>Book ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservations as $reservation) : ?>
                                    <tr>
                                        <td><?= $reservation["id"]; ?></td>
                                        <td><?= $reservation["reservation_date"]; ?></td>
                                        <td><?= $reservation["return_date"]; ?></td>
                                        <td><?= $reservation["isReturned"]; ?></td>
                                        <td><?= $reservation["user_id"]; ?></td>
                                        <td><?= $reservation["book_id"]; ?></td>
                                        <td class="table-actions d-flex">
                                            <a href="editReservation.php?id=<?php echo $reservation["id"]; ?>" class="btn btn-primary btn-sm ">Edit</a>
                                            <a href="deleteReservation.php?id=<?php echo $reservation["id"]; ?>" class="btn btn-danger btn-sm ml-1">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <nav class="d-flex">
                            <ul class="m-0 p-0">
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <div class="col-md-6">
                        <p class="copyright d-flex justify-content-end"> &copy 2021 Design by
                            <a href="#">Vishweb Design</a> BootStrap Admin Dashboard
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

</div>

<?php include("../../includes/admin/footer.php"); ?>