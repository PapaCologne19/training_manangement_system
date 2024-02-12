<?php 
if (isset($_SESSION['successMessage'])) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: "<?php echo $_SESSION['successMessage']; ?>",
        })
    </script>
    <?php unset($_SESSION['successMessage']);
} ?>
<?php
if (isset($_SESSION['errorMessage'])) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: "<?php echo $_SESSION['errorMessage']; ?>",
        })
    </script>
    <?php unset($_SESSION['errorMessage']);
}

if (isset($_SESSION['warningMessage'])) { ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: "<?php echo $_SESSION['warningMessage']; ?>",
        })
    </script>
    <?php unset($_SESSION['warningMessage']);
}
?>
