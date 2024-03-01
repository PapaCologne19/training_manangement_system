<?php
session_start();
require_once '../../model/connect.php';
require_once '../../model/Training.php';
require_once '../../model/Supervisor.php';

$database = new Database();
$connect = $database->connect();

$Training = new Training($connect);
$Supervisor = new Supervisor($connect);

if (isset($_SESSION['username'], $_SESSION['password'])) {
    ?>
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <?php include '../../components/header.php'; ?>
                            <title>List of Trainings</title>
                        </head>

                        <body>
                            <div class="layout-wrapper layout-content-navbar">
                                <div class="layout-container">
                                    <?php include '../../components/sidebar.php'; ?>

                                    <!-- Main page -->
                                    <div class="layout-page">
                                        <?php include '../../components/navbar.php'; ?>

                                        <!-- Content -->
                                        <div class="content-wrapper">
                                            <div class="container">
                                                <div class="card">
                                                    <div class="container">
                                                        <hr>
                                                        <h4 class="text-center">LIST OF TRAININGS</h4>
                                                        <hr>
                                                        <div class="container mb-4">
                                                            <button class="btn btn-dark"
                                                                onclick="location.href = 'list_of_training.php'">Back</button>
                                                        </div>
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $show = $Training->showTrainingById($id);
                                                        while ($row = $show->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                                <form action="../../controller/trainingController.php" method="POST" class="form-group">
                                                                                    <input type="hidden" name="token" value="<?php echo $id ?>">
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="" class="form-label">Training Title</label>
                                                                                        <input type="text" name="training_title" id="training_title"
                                                                                            class="form-control" value="<?= $row['training_title'] ?>" required>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="" class="form-label">Date and Time</label>
                                                                                        <input type="datetime-local" name="dateTime" id="dateTime"
                                                                                            value="<?= $row['datetime'] ?>" class="form-control" required>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="" class="form-label">Venue</label>
                                                                                        <input type="text" name="venue" id="venue" class="form-control"
                                                                                            value="<?= $row['venue'] ?>" required>
                                                                                    </div>

                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="project_title" class="form-label">Project Title</label>
                                                                                        <input type="text" name="project_title" id="project_title" class="form-control" value="<?= $row['project_title'] ?>" required>
                                                                                    </div>

                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="" class="form-label">Facilitator</label>
                                                                                        <input list="facilitators" name="facilitator" id="facilitator"
                                                                                            class="form-control" required>
                                                                                        <datalist id="facilitators">
                                                                                            <option value="<?= $row['facilitator'] ?>" selected>
                                                                                                <?= $row['facilitator'] ?>
                                                                                            </option>
                                                                                            <?php
                                                                                            $show = $Supervisor->show();
                                                                                            while ($rows = $show->fetch(PDO::FETCH_ASSOC)) {
                                                                                                ?>
                                                                                                                    <option value="<?php echo $rows['supervisor']; ?>">
                                                                                                                        <?php echo $rows['supervisor']; ?>
                                                                                                                    </option>
                                                                                            <?php } ?>
                                                                                        </datalist>
                                                                                    </div>
                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="" class="form-label">Division</label>
                                                                                        <select name="division" id="division" class="form-select" required>
                                                                                            <option value="<?= $row['division'] ?>" selected><?= $row['division'] ?></option>
                                                                                            <option value="BD1">BD1</option>
                                                                                            <option value="BD2">BD2</option>
                                                                                            <option value="BD3">BD3</option>
                                                                                            <option value="BSG">BSG</option>
                                                                                            <option value="HR">HR</option>
                                                                                            <option value="FINANCE">FINANCE</option>
                                                                                            <option value="STRAT">STRAT</option>
                                                                                            <option value="PPI">PPI</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-12 mt-3">
                                                                                        <label for="objectives" class="form-label">Objectives</label>
                                                                                        <textarea name="objectives" id="objectives" cols="30" rows="5" class="form-control"><?= $row['objectives'] ?></textarea>
                                                                                    </div>

                                                                                    <div class="col-md-12 mt-5 mb-3 text-center">
                                                                                        <button type="submit" name="update_training_btn"
                                                                                            class="btn btn-primary">Update</button>
                                                                                    </div>
                                                                                </form>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include '../../components/footer.php'; ?>

                        </body>

                        </html>
<?php } else {
    header("Location: ../../index.php");
    exit(0);
} ?>