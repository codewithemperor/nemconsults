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
    // Get the type parameter from the query string
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');

    if (type === 'reservation') {
        // Display SweetAlert2 success message and redirect to travel-reservations.php
        Swal.fire({
            icon: 'error',
            title: 'Payment Failed',
            text: 'We could not process your payment. Please try again later.',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the travel reservations page
                window.location.href = "https://nemconsults.com/travel-reservations.php";
            }
        });
    } else {
        // Display SweetAlert2 success message and redirect to consultation.php
        Swal.fire({
            icon: 'error',
            title: 'Payment Failed',
            text: 'We could not process your payment. Please try again later.',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the consultation page
                window.location.href = "https://nemconsults.com/consultation.php";
            }
        });
    }
</script>

</body>
</html>
