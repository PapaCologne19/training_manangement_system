<?php session_start(); 
include 'model/connect.php';
include 'model/Supervisor.php';

$database = new Database();
$connect = $database->connect();

$Supervisor = new Supervisor($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/img/logo/pcn.png" type="image/x-icon">

    <!-- {{-- Style CSS --}} -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- {{-- Bootstrap --}} -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="assets/bootstrap/dist/js/bootstrap.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- {{-- JS Script --}} -->
    <script src="assets/js/script.js"></script>

    <!-- {{-- Bootstrap Icons --}} -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- {{-- Sweet Alert --}} -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Login</title>
</head>

<body class="body">
    <?php include 'components/alertMessage.php'; ?>
    <center>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12 col-md-offset-3 bg-white">
                    <div class="panel">
                        <div class="panel-heading pt-3">
                            <div class="panel-title text-center mt-4" id="title">
                                <img src="assets/img/logo/pcn.png" alt="PCN Logo" width="50%"
                                    class="logo img-responsive">
                                <hr>
                            </div>
                        </div>
                        <div class="panel-body mt-3">
                            <div class="row">
                                <div class="col-lg-12 forms">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10 forms"
                                        action="controller/userController.php" method="post" style="display: block;">
                                        <div class="mt-1 d-flex align-items-center">
                                            <i class="bi bi-person me-2"></i>
                                            <input type="text" name="username" id="username" tabindex="1"
                                                class="form-control" placeholder="Username" autocomplete="off" required>
                                        </div>
                                        <div class="mt-4 d-flex align-items-center">
                                            <i class="bi bi-key me-2"></i>
                                            <input type="password" name="password" id="password" tabindex="2"
                                                class="form-control" placeholder="Password"
                                                autocomplete="current-password" required>
                                        </div>
                                        <div class="form-check showPasswordInput mt-3">
                                            <input class="form-check-input" type="checkbox" value=""
                                                onclick="showPasswords()" id="showPassword"
                                                style="border: 1px solid #BABABA !important;">
                                            <label class="form-check-label" for="showPassword" id="showPasswordLabel"
                                                style="transform: none !important; float: left;">
                                                Show password
                                            </label>
                                        </div>
                                        <div class="col-md-12 col-sm-6 col-sm-offset-3 mt-5">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3"
                                                class="btn btn-login" value="LOGIN"> Log in</button>
                                        </div>
                                        <div class="col-sm-12 col-md-12 pt-4 pb-4 mb-5">
                                            <a href="javascript:void(0)" class="registerAccount link"
                                                style="color: #BABABA;" data-bs-toggle="modal"
                                                data-bs-target="#registerModal"> Register Account here</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="controller/userController.php" method="POST" class="form-group">
                            <div class="col-md-12">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Firstname</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Middlename</label>
                                <input type="text" name="middlename" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Email Address</label>
                                <input type="email" name="email_address" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Division</label>
                                <input type="text" name="division" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">ID Number</label>
                                <input type="text" name="id_number" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Principal</label>
                                <input list="principals" name="principal" id="principal" class="form-control" required>
                                <datalist id="principals">
                                    <option value="" selected disabled></option>
                                    <option value="UNILEVER - PONDS(LDS)">
                                    <option value="UNILEVER - RRHI">
                                    <option value="UNILEVER - UI">
                                    <option value="URIC">
                                    <option value="URIC - HRI NAO">
                                    <option value="URIC - IC NOW ASSISTANT">
                                    <option value="URIC - NORTH PROX">
                                    <option value="URIC - NORTH SMKT">
                                    <option value="URIC - SMKT MASS">
                                    <option value="URIC - SMKT REGULAR">
                                    <option value="URIC - SMKT2">
                                    <option value="URIC - SOUTH PROX">
                                    <option value="URIC - TACTICAL">
                                    <option value="WIKO">
                                </datalist>
                            </div>
                            <div class="col-md-12">
                                <label for="" class="form-label">Supervisor</label>
                                <input list="supervisors" name="supervisor" id="supervisor" class="form-control"
                                    required>
                                <datalist id="supervisors">
                                    <option value="" selected disabled></option>
                                    <?php 
                                        $show = $Supervisor->show();
                                        while($row = $show->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                    <option value="<?php echo $row['supervisor'];?>"><?php echo $row['supervisor'];?></option>
                                    <?php } ?>
                                </datalist>
                            </div>
                    </div>
                </div>
                <div class="modal-footer pt-5 pb-4 px-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>