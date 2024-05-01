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
                            <h1>Barangay Item Inventory</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item text-decoration-none"><a href="dashboard.php">Home</a>
                                </li>
                                <li class="breadcrumb-item text-decoration-none text-secondary"><i>Request</i>
                                </li>
                                <li class="breadcrumb-item text-secondary">Barangay Item Inventory</li>
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
                                                <th>Picture</th>
                                                <th>Item Name</th>
                                                <th>Stocks</th>
                                                <th>Time Added</th>
                                                <th class="text-center" style="width: 150px;">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                            $count =1;
                                            $query = "SELECT * FROM `barangay_inventory` ";
                                            $result = mysqli_query(getDatabase(), $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr id="<?php echo $row['id']; ?>">
                                                <td>
                                                    <?php echo $count++ ?>
                                                </td>
                                                <td>
                                                    <img src="../assets/images/item/<?php echo $row['picture']; ?>"
                                                        alt="Member Picture" width="200">
                                                </td>
                                                <td>
                                                    <?php echo $row['item_name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm btn-update-stock"
                                                        data-id="<?php echo $row['id']; ?>"
                                                        data-action="plus">+</button>
                                                    <?php echo $row['stocks']; ?>
                                                    <button class="btn btn-danger btn-sm btn-update-stock"
                                                        data-id="<?php echo $row['id']; ?>"
                                                        data-action="minus">-</button>
                                                </td>


                                                <td>
                                                    <?php echo $row['time_added']; ?>
                                                </td>
                                                <td class="text-center" style="width: 150px;">
                                                    <button type="button" class="btn " data-bs-toggle="modal"
                                                        data-bs-target="#viewItem_modal"
                                                        data-id="<?php echo $row['id']; ?>" data-role="viewItem_btn">
                                                        <i class="fa-solid fa-eye fa-xl" style="color: green;"></i>
                                                    </button>

                                                    <button type="button" class="btn " data-bs-toggle="modal"
                                                        data-bs-target="#editItem_modal"
                                                        data-id="<?php echo $row['id']; ?>" data-role="editItem_btn">
                                                        <i class="fa-solid fa-pen-to-square fa-xl"
                                                            style="color: blue;"></i>
                                                    </button>

                                                    <button type="button" class="btn "
                                                        data-id="<?php echo $row['id']; ?>" data-role="deleteItem_btn">
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

    <!-- View Item Modal -->
    <div class="modal fade" id="viewItem_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">View Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="ViewItemModalForm" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="view_ImageItem">Picture </label>
                                        <img alt="Item Picture" id="viewPreview_ImageItem" class="w-100">
                                    </div>
                                </div>
                                <div class="row py-1 mt-5">
                                    <div class="col">
                                        <label for="view_ItemName">Item Name</label>
                                        <input type="text" class="form-control form-control-border" id="view_ItemName"
                                            name="view_ItemName" placeholder="Item" readonly>
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="view_stocks">Item Stocks</label>
                                        <input type="number" class="form-control form-control-border" id="view_stocks"
                                            name="view_stocks" placeholder="Item Stocks" readonly>
                                    </div>
                                </div>
                                <div class="row py-1">
                                    <div class="col">
                                        <label for="time_added">Time Added</label>
                                        <input type="text" class="form-control form-control-border" id="time_added"
                                            name="time_added" placeholder="time_added" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary btn-block">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--edit Modal -->
    <div class="modal fade" id="editItem_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editeventform" method="post">
                        <input type="hidden" class="form-control form-control-border" id="id" name="id">
                        <div class="row">
                            <div class="col">
                                <label for="editPreview_Imageitem">Image Preview:
                                    <span id="selectedFileName"
                                        class="text-muted font-weight-normal font-italic"></span>
                                </label>
                                <img alt="Member Picture" id="editPreview_Imageitem" class="w-100">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="edit_Imageitem">Change Image?</label>
                                <input type="file" class="form-control form-control-border" id="edit_Imageitem"
                                    name="edit_Imageitem">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="edit_ItemName">Item Name</label>
                                <input type="text" class="form-control form-control-border" id="edit_ItemName"
                                    name="edit_ItemName" placeholder="Item">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="edit_stocks">Item Stocks</label>
                                <input type="number" class="form-control form-control-border" id="edit_stocks"
                                    name="edit_stocks" placeholder="Item Stocks">
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
    // View Announcement: Populate Fields 
    $(document).on('click', 'button[data-role=viewItem_btn]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_inventory.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response) {
                $('#viewPreview_ImageItem').attr('src', '../assets/images/item/' + response
                    .picture);
                $('#view_ItemName').val(response.item_name);
                $('#time_added').val(response.time_added);
            }
        })

    });

    // Edit Announcement: Populate Fields
    $(document).on('click', 'button[data-role=editItem_btn]', function() {
        $.ajax({
            type: "POST",
            url: "../server/read_inventory.php",
            data: {
                id: $(this).attr('data-id'),
            },
            dataType: "json",
            success: function(response) {
                $('#editPreview_Imageitem').attr('src', '../assets/images/item/' + response
                    .picture);
                $('#id').val(response.id);
                $('#edit_ItemName').val(response.item_name);
                $('#edit_stocks').val(response.stocks);

                const selectedFileName = response.picture;
                if (selectedFileName) {
                    $('#selectedFileName').text(selectedFileName);
                }
            }
        });

        const fileInput = $("#edit_Imageitem");
        const imagePreview = $("#editPreview_Imageitem");
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
            $('#selectedFileName').text(fileInput.val().split("\\").pop()); // Extract the file name
        });

    });
    // Edit Announcement: Submit Fields
    $('#editeventform').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
            $('#editItem_modal').modal('hide');
            if (result.isConfirmed) {
                $.ajax({
                    url: "../server/edit_inventory.php",
                    type: "POST",
                    data: new FormData(this),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            toastr.success(response.message, '', {
                                timeOut: 1000,
                                closeButton: false,
                                onHidden: function() {
                                    location.reload();
                                }
                            });
                            systemChanges(response.admin, response.operation, response
                                .description);
                        } else {
                            toastr.error(response.message, '', {
                                closeButton: false,
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
            } else if (result.isDenied) {
                toastr.info('Changes are not saved', '', {
                    closeButton: false
                });
            }
        });
    });

    // Delete Announcement: Delete Fields
    $(document).on('click', 'button[data-role=deleteItem_btn]', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../server/delete_inventory.php",
                    data: {
                        id: $(this).attr('data-id'),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500,
                            }).then(() => {
                                location.reload();
                            });

                            systemChanges(response.admin,
                                response.operation,
                                response.description);

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(error) {
                        toastr.error('Error occurred: ' + error, '', {
                            positionClass: 'toast-top-end',
                            closeButton: false
                        });
                    }
                });
            }
        })
    });
    </script>
</body>

</html>