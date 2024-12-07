<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
    $pageTitle = "Nemconsults - Success";
    require_once './include/header.php';
    ?>
    <!-- Head ends-->
<body>


<script>
    // Display SweetAlert2 success message
    Swal.fire({
        title: 'Success!',
        text: 'Your payment was completed successfully.',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to index.php on confirmation
            window.location.href = "http://localhost/nemconsults/index.php";
        }
    });
</script>

</body>
</html>
