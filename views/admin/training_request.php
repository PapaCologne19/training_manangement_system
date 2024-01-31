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
                                <div class="container table-responsive">
                                    <hr>
                                        <h4 class="text-center">TRAINING REQUESTS</h4>
                                    <hr>

                                    <table class="table table-sm" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Training Title</th>
                                                <th class="text-center">Date and Time Requested</th>
                                                <th class="text-center">Venue</th>
                                                <th class="text-center">Requestor</th>
                                                <th class="text-center">Facilitator</th>
                                                <th class="text-center">Division</th>
                                                <th class="text-center">Request Status</th>
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
                                                        <?php 
                                                            if($row['is_approve'] === '0'){
                                                            echo '<span class="badge bg-warning rounded">Pending</span>';    
                                                            } elseif($row['is_approve'] === '1'){
                                                            echo '<span class="badge bg-success rounded">Approved</span>';
                                                            } else {
                                                                echo '<span class="badge bg-danger rounded">Rejected</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php 
                                                            $fullname = $row['firstname'] . " " . $row['lastname'];
                                                            if($row['is_approve'] === '0'){ ?>
                                                            <input type="hidden" class="id" value="<?= $row['id'];?>">
                                                            <input type="hidden" class="email" value="<?= $row['email_address'];?>">
                                                            <input type="hidden" class="fullname" value="<?= $fullname;?>">
                                                            <button type="button" class="btn btn-sm btn-success accept_btn">Accept</button>
                                                            <button type="button" class="btn btn-sm btn-danger reject_btn">Reject</button>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn btn-sm btn-success" disabled>Accept</button>
                                                            <button type="button" class="btn btn-sm btn-danger" disabled>Reject</button>
                                                        <?php }?>
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