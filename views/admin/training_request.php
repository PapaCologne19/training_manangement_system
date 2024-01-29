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
        <?php include '../../components/header.php'; ?>
        <title>Training Request</title>
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
                                        <h4 class="text-center">TRAINING REQUESTS</h4>
                                    <hr>

                                    <table class="table table-sm" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Training Title</th>
                                                <th class="text-center">Date and Time Requested</th>
                                                <th class="text-center">Requestor</th>
                                                <th class="text-center">Venue</th>
                                                <th class="text-center">Facilitator</th>
                                                <th class="text-center">Division</th>
                                                <th class="text-center">Action</th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $show = $Training->showTrainingRequest();
                                                while($row = $show->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['training_title'];?></td>
                                                    <td class="text-center"><?php echo $row['datetime_request'];?></td>
                                                    <td class="text-center"><?php echo $row['venue'];?></td>
                                                    <td class="text-center"><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'];?></td>
                                                    <td class="text-center"><?php echo $row['facilitator'];?></td>
                                                    <td class="text-center"><?php echo $row['division'];?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-success">Accept</button>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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