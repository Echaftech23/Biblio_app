    <?php

    use App\controllers\admin\ReservationController; ?>
    <?php require_once "../../App/controllers/admin/ReservationController.php"; ?>
    <?php $reservation = new ReservationController(); ?>
    <?php $reservations = $reservation->showReservations(); ?>

    <?php include('../../includes/admin/header.php') ?>
    <!-- start of body -->

    <!-- Sidebar  -->
    <?php include("../../includes/sidebar.php") ?>

    <!-- Page Content  -->
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

            <div class="row ">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: 485px">

                        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #212529;">
                            <div class="container-fluid">

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <form class="d-flex me-auto mb-2 mb-lg-0" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                    <ul class="navbar-nav">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Add Reservation
                                        </button>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Book Information Form
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                            <div class="form-group">
                                                <label for="title">Title:</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="author">Author:</label>
                                                <input type="text" class="form-control" id="author" name="author" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="genre">Genre:</label>
                                                <input type="text" class="form-control" id="genre" name="genre" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="genre">Description:</label>
                                                <input type="text" class="form-control" id="Description" name="description" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pubYear">Publication Year:</label>
                                                <input type="text" class="form-control" id="pubYear" name="publication_year" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="totCopies">Total Copies:</label>
                                                <input type="number" class="form-control" id="totCopies" name="total_copies" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="availCopies">Available Copies:</label>
                                                <input type="number" class="form-control" id="availCopies" name="available_copies" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-content table-responsive pt-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="fw-bold">ID</th>
                                        <th class="fw-bold">reservation_date</th>
                                        <th class="fw-bold">return_date</th>
                                        <th class="fw-bold">isReturned</th>
                                        <th class="fw-bold">user_id</th>
                                        <th class="fw-bold">book_id</th>
                                        <th class="fw-bold">actions</th>
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
                                                <a href="edit.php?reservation_id=<?php echo $reservation["id"]; ?>" class="btn btn-primary btn-sm ">Edit</a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-sm ml-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $reservation["id"]; ?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="<?= $reservation["id"]; ?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are sure you want to delete this book
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="delete.php?reservation_id=<?php echo $reservation["id"]; ?>" class="btn btn-primary">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <?php include("../../includes/admin/footer.php") ?>