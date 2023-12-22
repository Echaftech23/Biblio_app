    <?php

    session_start();
    use App\controllers\admin\BookController; ?>
    <?php require_once "../../app/controllers/admin/BookController.php"; ?>
    <?php $bookController = new BookController(); ?>
    <?php $books = $bookController->showBooks(); ?>

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
                                    <p class="navbar-nav fw-bold">YOUBOOK MARKET PLACE</p>
                                    <form class="ms-auto mb-2 mb-lg-0" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search Book" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </nav>



                        <div class="card-content table-responsive pt-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="fw-bold">ID</th>
                                        <th class="fw-bold">Title</th>
                                        <th class="fw-bold">Author</th>
                                        <th class="fw-bold">Genre</th>
                                        <th class="fw-bold">Publication Year</th>
                                        <th class="fw-bold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($books as $book) : ?>
                                        <tr>
                                            <td><?= $book["id"]; ?></td>
                                            <td><?= $book["title"]; ?></td>
                                            <td><?= $book["author"]; ?></td>
                                            <td><?= $book["genre"]; ?></td>
                                            <td><?= $book["publication_year"]; ?></td>
                                            <td class="table-actions d-flex">
                                                <a href="#?id=<?php echo $book["id"]; ?>" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#<?php echo $book["id"]; ?>">Book</a>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade m-auto   col-3" id="<?php echo $book["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Book Information Form
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">                                                            
                                                            <form action="../../app/controllers/admin/ReservationController.php" method="post">

                                                                <input type="hidden" class="form-control" name="book_id" value="<?php echo $book["id"]; ?>">
                                                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['auth_user']["id"]; ?>">
                                                                <div class="form-group">
                                                                    <label for="reservation_date">Reservation Date:</label>
                                                                    <input type="text" class="form-control" id="reservation_date" value="<?php echo date('d/m/Y'); ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="return_date">Return Date:</label>
                                                                    <input type="date" class="form-control" id="return_date" name="return_date">
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
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </div>

    <?php include("../../includes/admin/footer.php") ?>