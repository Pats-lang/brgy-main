<?php
include '../config/connection.php';
include '../server/admin_login-verification.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGBMS | E-Governance Barangay Management System</title>
    <?php include 'import.php'; ?>
    <script src="../assets/js/system_changes.js?v=<?php echo time(); ?>" defer></script>
</head>
<style>
/* Add your styles here */
.id-card {
    border: 1px solid #000;
    padding: 20px;
    margin: 20px;
    max-width: 300px;
}

.id-card img {
    width: 100%;
    height: auto;
}

/* edit form style*/
.profile-picture-container {
    position: relative;
    overflow: hidden;
}

.profile-picture-label {
    display: block;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.profile-picture-label img {
    transition: transform 0.3s ease-in-out;
}

.profile-picture-label:hover img {
    transform: scale(1.1);
}

.change-picture-text {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 5px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.profile-picture-label:hover .change-picture-text {
    opacity: 1;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Resident Verification</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Resident
                                        Verification</i>
                                <li class="breadcrumb-item text-secondary">Verification </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon text-white text-bold" style="background-color: #20b503">
                                        Verification
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="member_" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Generated File</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                               $query = "SELECT * FROM `generatedpdf_id`";
                                               $result = mysqli_query(getDatabase(), $query);
                                               while ($row = mysqli_fetch_array($result)) {
                                             ?>
                                            <tr id="<?php echo $row['id']; ?>">

                                                <td>
                                                    <?php echo $row['generated_file']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['admin']; ?>
                                                </td>

                                                <td class="text-center">
                                                    <button type="button" class="btn bg-green view-pdf-btn"
                                                        data-bs-toggle="modal" data-bs-target="#pdfModal"
                                                        data-pdf-url="<?php echo '../assets/generated_pdf/' . $row['admin']; ?>">
                                                        <i class="fa-solid fa-eye fa-xl" style="color: white;"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include 'includes/admin_footer.php'; ?>


    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Barangay Id Print</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfViewer" frameborder="0" width="100%" height="500"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Function to open modal and load PDF file
        $('.view-pdf-btn').click(function() {
            var pdfUrl = $(this).data('pdf-url');
            $('#pdfViewer').attr('src', pdfUrl);
            $('#pdfModal').modal('show');
        });
    });

    $(document).ready(function() {
        $('#member_').DataTable({
            buttons: [{
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                }, {
                    text: '<i class="fa-solid fa-print"></i>',
                    className: 'print-btn',
                    action: function(e, dt, node, config) {
                        location.href = "../server/print_member.php";
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Columns'
                },
            ],
            dom: 'Bfrtip',
            responsive: true
        });

    });
    </script>
</body>

</html>