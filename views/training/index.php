<?php
session_start();
require_once '../../model/connect.php';
require_once '../../model/Training.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);

if (isset($_SESSION['username'], $_SESSION['password'])) {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="shortcut icon" href="../../assets/img/logo/pcn.png" type="image/x-icon">

            <!-- {{-- Style CSS --}} -->
            <link rel="stylesheet" href="../../assets/css/style.css">

            <!-- {{-- Bootstrap --}} -->
            <link rel="stylesheet" href="../../assets/bootstrap/dist/css/bootstrap.css">
            <link rel="stylesheet" href="../../assets/bootstrap/dist/css/bootstrap.min.css">
            <script src="../../assets/bootstrap/dist/js/bootstrap.js"></script>
            <script src="../../assets/bootstrap/dist/js/bootstrap.min.js"></script>

            <!-- {{-- JS Script --}} -->
            <script src="../../assets/js/script.js"></script>

            <!-- {{-- Bootstrap Icons --}} -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

            <!-- {{-- Sweet Alert --}} -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <title>Home</title>

           <style>
            .card {
                border: none!important;
                border-radius: 30px !important;
                background: #e0e0e0 !important;
                box-shadow: 15px 15px 30px #bebebe,
                        -15px -15px 30px #ffffff !important;
            }
           </style>
        </head>

        <body style="background-color: #e0e0e0 !important;">
            <!-- NavBar -->
            <?php include '../../components/alertMessage.php'; ?>
            <?php include '../../components/nav.php'; ?>

            <!-- Main Section -->
            <div class="container mt-5 mb-3">
                <div class="row">
                    <?php
                    $show = $Training->showTraining();
                    while ($row = $show->fetch(PDO::FETCH_ASSOC)) {
                        $date_create = date_create($row['datetime']);
                        $date_format = date_format($date_create, 'F j, Y - h:i a');
                        ?>
                            <div class="col-md-4">
                                <a href="create.php?id=<?= $row['id']; ?>" class="training_links">
                                    <div class="card p-4 mb-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <i class="bi bi-bank2"></i>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <h4 class="heading fw-semibold">
                                                <?php echo $row['training_title']; ?>
                                            </h4>
                                            <span class="mb-0 text-body-secondary">
                                                <?php echo $date_format; ?>
                                            </span>
                                            <br>
                                            <span class="mb-0 text-body-secondary">
                                                <?php echo $row['venue']; ?>
                                            </span>
                                            <br>
                                            <span class="mb-0 text-body-secondary">
                                                <?php echo $row['project_title']; ?>
                                            </span>
                                            <div class="mt-5">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php } ?>
                </div>
            </div>
        </body>

        </html>
<?php } else {
    header("Location: ../../index.php");
    exit();
} ?>