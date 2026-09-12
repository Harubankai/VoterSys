<?php

if (isset($_SESSION['success'])) {
    echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '" . $_SESSION['success'] . "',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    ";
    unset($_SESSION['success']); 
}


if (isset($_SESSION['error'])) {
    echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '" . $_SESSION['error'] . "',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    ";
    unset($_SESSION['error']);
}
?>
