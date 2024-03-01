<?php
session_start();

if (isset($_SESSION['username'], $_SESSION['password'])) {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php include '../../components/header.php'; ?>
            <title>Admin</title>
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