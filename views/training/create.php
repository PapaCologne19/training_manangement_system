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
    <title>Register</title>

        <style>
            .card {
                border: none !important;
                border-radius: 30px !important;
                box-shadow: 15px 15px 30px #bebebe,
                    -15px -15px 30px #ffffff !important;
            }
        </style>

    </head>

    <body>
        <?php include '../../components/alertMessage.php'; ?>
        <div class="container mt-5 mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $id = $_GET['id'];
                            $show = $Training->showTrainingById($id);
                            $row = $show->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <h3 class="fs-4 m-4 text-center fw-bold">TRAINING/ACTIVITY REQUEST FORM</h3>
                            <form action="../../controller/trainingController.php" method="POST" class="form-group row">
                                <input type="hidden" name="token" value="<?php echo $_SESSION['id']; ?>">
                                <input type="hidden" name="training_id" value="<?php echo $id; ?>">

                                <div class="mt-3 mb-2 text-center fw-bold bg-light">
                                    <label class="form-label">Requisitioner Details</label>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">Date</label>
                                    <input type="text" name="current_date" id="current_date" value="<?php echo date('F d, Y') ?>" readonly class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>" readonly required>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">Department/Division</label>
                                    <input type="text" name="department" id="department" class="form-control" value="<?php echo $_SESSION['division'] ?>" readonly required>
                                </div>

                                <div class="mt-5 mb-2 text-center fw-bold bg-light">
                                    <label class="form-label">Training Details</label>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">What (Training Title)</label>
                                    <input type="text" name="training_title" id="training_title" value="<?php echo $row['training_title'] ?>" readonly class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">When (Date and Time)</label>
                                    <input type="datetime-local" name="dateTime" id="dateTime" value="<?php echo $row['datetime'] ?>" readonly class="form-control" required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Where (Venue)</label>
                                    <input type="text" name="venue" id="venue" class="form-control" value="<?php echo $row['venue'] ?>" readonly required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Who (Project)</label>
                                    <input type="text" name="project_title" id="project_title" class="form-control" value="<?php echo $row['project_title'] ?>" readonly required>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="" class="form-label">Why (Objectives)</label>
                                    <textarea name="objectives" id="objectives" class="form-control" cols="30" rows="3" readonly><?php echo $row['objectives'] ?></textarea>
                                </div>


                                <div class="mt-5 mb-2 text-center fw-bold bg-light">
                                    <label class="form-label">Additional Training Details</label>
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Division</label>
                                    <input type="text" name="division" id="division" class="form-control" value="<?php echo $row['division'] ?>" readonly required>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Facilitator</label>
                                    <input type="text" name="facilitator" id="facilitator" value="<?php echo $row['facilitator'] ?>" class="form-control" readonly required>
                                </div>

                                <div class="col-md-12 mt-5 mb-3 text-center">
                                    <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php'" </button>Back</button>
                                    <button type="submit" name="register_btn" class="btn btn-primary">Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: ../../index.php");
    exit();
} ?>