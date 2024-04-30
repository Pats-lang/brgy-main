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
</head>
<style>
.modal-lg {
    max-width: 80%;
    /* You can adjust the percentage according to your needs */
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Requesting Tools</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Request</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Requesting Tools</li>
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
                                <div class="card-body">
                                    <table id="manageitem_Table" class="table responsive">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>fullname</th>
                                                <th>address</th>
                                                <th>borrowed_sched</th>
                                                <th >return_sched</th>
                                                <th >contact</th>
                                                <th >purpose</th>
                                                <th >status</th>
                                                <th >time_added</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $count =1;
                                            $query = "SELECT * FROM `request_tools` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $count++ ?>
                                                </td>
                                                <td>
                                                <?php echo $row['fullname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['address']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['borrowed_sched']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['return_sched']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['contact']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['purpose']; ?>
                                                </td>
                                                <td class="text-center">
                                                   <?php echo $row['status']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['time_added']; ?>
                                                </td>
                                                <td class="text-center" style="width: 150px;">
                                                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#viewItem_modal" data-id="<?php echo $row['id']; ?>" data-role="viewItem_btn">
                                                            <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#editItem_modal" data-id="<?php echo $row['id']; ?>" data-role="editItem_btn">
                                                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: blue;"></i>
                                                        </button>

                                                        <button type="button" class="btn " data-id="<?php echo $row['id']; ?>" data-role="deleteItem_btn">
                                                            <i class="fa-solid fa-trash fa-xl" style="color: red;"></i>
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
    <!--Add Modal -->
    <div class="modal fade" id="add_item-Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="AddItemModalForm" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="add_ImageItem">Picture </label>
                                        <img alt="Item Picture" id="addPreview_ImageItem" class="w-100">
                                        <input type="file" class="form-control form-control-border" id="add_ImageItem"
                                            name="add_ImageItem">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="add_ItemName">Item Name</label>
                                        <input type="text" class="form-control form-control-border" id="add_ItemName"
                                            name="add_ItemName" placeholder="Item">
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="add_stocks">Item Stocks</label>
                                        <input type="number" class="form-control form-control-border" id="add_stocks"
                                            name="add_stocks" placeholder="Item Stocks">
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <?php include 'includes/admin_footer.php'; ?>
    <script>
    $(document).ready(function() {
        $('#manageitem_Table').DataTable({
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
                },
                {
                    text: '+',
                    className: 'add-btn',
                    action: function(e, dt, node, config) {
                        $('#add_item-Modal').modal('show');

                        const fileInput = $("#add_ImageItem");
                        const imagePreview = $("#addPreview_ImageItem");
                        imagePreview.hide();
                        fileInput.on("change", function() {

                            if (fileInput[0].files.length > 0) {
                                const selectedFile = fileInput[0].files[0];
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    imagePreview.attr("src", e.target.result);
                                    imagePreview.show();
                                };
                                reader.readAsDataURL(selectedFile);
                            } else {
                                imagePreview.hide();
                            }
                        });

                    }
                },
            ],
            dom: 'Bfrtip',
            responsive: true
        });
    });


    // Add item: Submit Fields
    $('#AddItemModalForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../server/add_barangay_item.php',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response_additem) {
                $('#add_item-Modal').modal('hide');
                if (response_additem.status) {
                    toastr.success(response_additem.message, '', {
                        positionClass: 'toast-top-right',
                        timeOut: 1000,
                        closeButton: false,
                        onHidden: function() {
                            location.reload();
                        }
                    });
                    systemChanges(response_additem.admin, response_additem
                        .operation, response_additem.description);

                } else {
                    toastr.error(response_additem.message, '', {
                        positionClass: 'toast-top-right',
                        closeButton: false
                    });
                }
            },
            error: function(error) {
                toastr.error('An Error occurred: ' + error, '', {
                    positionClass: 'toast-top-end',
                    closeButton: false
                });
            }
        });
    })
    $(document).ready(function() {
        $('.btn-update-stock').click(function() {
            var itemId = $(this).data('id');
            var action = $(this).data('action');

            // Log itemId and action
            console.log("itemId:", itemId);
            console.log("action:", action);

            $.ajax({
                type: 'POST',
                url: '../server/edit_stock.php',
                data: {
                    id: itemId,
                    action: action
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    location.reload();
                    // Reload or update the table as needed
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
</body>

</html>