<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries : Delete My Account
  </title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
 

    <!-- Delete My Account Form -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="card">
            <div class="card-header bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Delete My Account</h6>
            </div>
            <div class="card-body">
              <form id="deleteAccountForm" class="text-start">
                <div class="alert alert-danger" role="alert">
                  Warning: Deleting your account will remove all your data from our system. This action is irreversible.
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <textarea placeholder="Please share your reason..." id="reason" name="reason" class="form-control"></textarea>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Confirm Email Address:</label>
                  <input type="email" id="confirmEmail" name="confirmEmail" class="form-control" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Delete My Account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

  <script>
    document.getElementById('deleteAccountForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const confirmEmail = document.getElementById('confirmEmail').value;
      // Replace with your actual email confirmation and account deletion logic
      if (confirmEmail === "user@example.com") { // Replace with the actual user's email check
        alert('Account deletion request submitted.');
        // Redirect or handle post-deletion logic here
      } else {
        alert('Email confirmation failed. Please enter the correct email address.');
      }
    });
  </script>
</body>

</html>
