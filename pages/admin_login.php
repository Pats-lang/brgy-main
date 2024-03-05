<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Managemnt System</title>

   

    <?php include 'import.php'; ?>
</head>

<body class="hold-transition login-page" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../assets/images/background.jpg'); min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">
<div class="login-box" style="box-shadow: 20px 20px 8px rgba(0, 0, 0, 0.5);">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <h2><img src="../assets/images/logo/barangay.gif" style="width: 50px; height: 50px;"> Barangay Management System </h2>            </div>
            <div class="card-body">
                <p class="login-box-msg text-secondary">Sign in to start your session.</p>

                <form id="admin_logInForm" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">

                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                   
                </form>

            </div>

        </div>
    </div>

    <script>
    $('#admin_logInForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../server/admin_validation.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message, '', {
                        positionClass: 'toast-top-right',
                        timeOut: 1500,
                        closeButton: false,
                        onHidden: function() {
                            // Redirect to index.php after the toast message is hidden
                            window.location.href = 'dashboard.php';
                        }
                    });
                } else {
                    toastr.error(response.message, '', {
                        positionClass: 'toast-top-right',
                        closeButton: false
                    });
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
</script>
</body>

</body>

</body>

</html>