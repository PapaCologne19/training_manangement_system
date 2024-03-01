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
                                    <div class="container table-responsive">
                                        <hr>
                                        <h4 class="text-center">LIST OF TRAININGS</h4>
                                        <hr>
                                        <div class="container mb-4">
                                            <butt class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addTrainingModal">Add Training</button>
                                        </div>
                                        <table class="table table-sm" id="example">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Training Title</th>
                                                    <th class="text-center">Date and Time Requested</th>
                                                    <th class="text-center">Venue</th>
                                                    <th class="text-center">Project Title</th>
                                                    <th class="text-center">Facilitator</th>
                                                    <th class="text-center">Division</th>
                                                    <th class="text-center">Objectives</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $show = $Training->showTraining();
                                                while ($row = $show->fetch(PDO::FETCH_ASSOC)) {
                                                    $date_create = date_create($row['datetime']);
                                                    $date_format = date_format($date_create, 'F d, Y - h:i A')
                                                        ?>
                                                        <tr>
                                                            <td class="text-center">
                                                                <?php echo $row['training_title']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $date_format; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row['venue']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row['project_title']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row['facilitator']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $row['division']; ?>
                                                            </td>
                                                            <td class="text-center text-wrap">
                                                                <?php echo $row['objectives'];?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="contain">
                                                                    <div class="column">
                                                                        <a href="edit_list_of_training.php?id=<?= $row["id"] ?>"
                                                                            class="btn btn-sm btn-success">Edit</a>
                                                                    </div>
                                                                    <div class="column">
                                                                        <input type="hidden" name="delete_id" class="delete_id"
                                                                            value="<?= $row['id'] ?>">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger delete_btn_for_training">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>


                                        <!-- Modal for Adding Training -->
                                        <div class="modal fade" id="addTrainingModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Training</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <form action="../../controller/trainingController.php" method="POST"
                                                                class="form-group">

                                                                <!-- Input Form for Training Title -->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="training_title" class="form-label">Training Title</label>
                                                                    <input type="text" name="training_title" id="training_title"
                                                                        class="form-control" required>
                                                                </div>
                                                                <!-- End of input form for Training Title -->

                                                                <!-- Input Form for Trainings' Date and Time-->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="dateTime" class="form-label">Date and Time</label>
                                                                    <input type="datetime-local" name="dateTime" id="dateTime"
                                                                        class="form-control" required>
                                                                </div>
                                                                <!-- End of input form for Trainings' Date and Time -->

                                                                <!-- Input Form for Training Venue-->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="venue" class="form-label">Venue</label>
                                                                    <input type="text" name="venue" id="venue"
                                                                        class="form-control" required>
                                                                </div>
                                                                <!-- End of input form for Trainings Venue -->

                                                                <!-- Input Form for Project Title -->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="project_title" class="form-label">Project Title</label>
                                                                    <input type="text" name="project_title" id="project_title" class="form-control" required>
                                                                </div>
                                                                <!-- End of input form for Project Title -->

                                                                <!-- Input Form for Facilitator -->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="facilitator" class="form-label">Facilitator</label>
                                                                    <input list="facilitators" name="facilitator"
                                                                        id="facilitator" class="form-control" required>
                                                                    <datalist id="facilitators">
                                                                        <option value="" selected disabled></option>
                                                                        <?php
                                                                        $show = $Supervisor->show();
                                                                        while ($row = $show->fetch(PDO::FETCH_ASSOC)) {
                                                                            ?>
                                                                                <option value="<?php echo $row['supervisor']; ?>">
                                                                                    <?php echo $row['supervisor']; ?>
                                                                                </option>
                                                                        <?php } ?>
                                                                    </datalist>
                                                                </div>
                                                                <!-- End of input form for Facilitator -->

                                                                <!-- Input Form for Division -->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="division" class="form-label">Division</label>
                                                                    <select name="division" id="division" class="form-select" required>
                                                                        <option value="" selected disabled>Select</option>
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
                                                                <!-- End of input form for Division -->

                                                                <!-- Input Form for Objectives -->
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="objectives" class="form-label">Objectives</label>
                                                                    <textarea name="objectives" id="objectives" cols="30" rows="5" class="form-control"></textarea>
                                                                </div>
                                                                <!-- End of input form for Objectives -->

                                                                <div class="col-md-12 mt-5 mb-3 text-center">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add_training_btn"
                                                                        class="btn btn-primary">Add</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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