<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
    $pageTitle = "Nemconsults - Cancelled Payment";
    require_once './include/header.php';
    ?>
    <!-- Head ends-->
<body>


<script>
    // Display SweetAlert2 success message
    Swal.fire({
        icon: 'error',
        title: 'Payment Failed',
        text: 'We could not process your payment. Please try again later.',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to index.php on confirmation
            window.location.href = "https://nemconsults.com/consultation.php";
        }
    });
</script>

</body>
</html>
