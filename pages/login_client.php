


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
  <link rel="stylesheet" href="../assets/css/login.css" />
  <title>Sign in</title>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>


<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form id="client_logInForm" method="post" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <input type="submit" value="Login" class="btn solid" />
          
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <a href="../pages/client/register_users.php">
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button> </a>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#client_logInForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: '../server/login_validation.php',
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
                  window.location.href = '../client_index.php';
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
    });
  </script>
</body>

</html>