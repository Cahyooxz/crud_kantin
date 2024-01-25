<?php
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <title>Aplikasi CRUD</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datepicker.min.css">
</head>
<body>
    <?php
    include '../layouts/navbar.php';
    ?>

    <div class="container">
        <?php
        if (empty($_GET["page"])) {
            include "data_barang.php";
        }elseif($_GET['page'] == 'tambah'){
            include "tambah_barang.php";
        }elseif($_GET['page'] == 'ubah'){
            include "ubah_barang.php";
        }
        ?>
    </div> <!-- /.container -->

<?php
include '../layouts/footer.php';
?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.datepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {

            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight:true
            });

            // toolip
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</body>
</html>