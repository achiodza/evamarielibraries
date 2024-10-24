<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Eva Marie Libraries:Login
  </title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
    /* Loader styles */
    .loader {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 999; /* Sit on top */
      left: 50%;
      top: 50%;
      width: 50px;
      height: 50px;
      margin: -25px 0 0 -25px; /* Center the loader */
      border: 8px solid #f3f3f3; /* Light grey */
      border-top: 8px solid #3498db; /* Blue */
      border-radius: 50%;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <!-- Logo -->
              <div class="text-center mt-3">
                <img src="./assets/img/logos.png" alt="Eva Marie Libraries Logo" width="150">
              </div>
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
               
              </div>
              <div class="card-body">
                <form id="loginForm" role="form" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" required>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div id="error-message" class="text-danger text-center"></div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="#" class="text-info text-gradient font-weight-bold">Nothing to See Here!</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!-- Loader -->
  <div class="loader" id="loader"></div>
  <!-- Core JS Files -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');
    const loader = document.getElementById('loader');

    loader.style.display = 'block'; // Show loader

    // Send the email as a query parameter
    fetch(`https://admin.evamarielibraries.org/api/users?filters[email][$eq]=${encodeURIComponent(email)}`, {
      method: 'GET',
      headers: {
        'Authorization': 'Bearer d68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b',
        'Content-Type': 'application/json'
      }
    })
    .then(response => {
      loader.style.display = 'none'; // Hide loader
      if (!response.ok) {
        throw new Error('User not found or server error');
      }
      return response.json();
    })
    .then(data => {
      if (data.length === 0) {
        errorMessage.textContent = 'Login failed: Invalid credentials';
        return;
      }

      const user = data[0];
      console.log('Stored password (user.pwd):', user.pwd);
console.log('Entered password (password):', password);
      if (user.pwd && user.pwd === password) {
        window.location.href = './pages/dashboard.php';
      } else {
        //console.log('Password comparison result:', user.pwd === password);
        errorMessage.textContent = 'Login failed: Invalid credentials';
      }
    })
    .catch(error => {
      console.error('Error:', error);
      errorMessage.textContent = 'An error occurred during login: ' + error.message;
      loader.style.display = 'none'; // Hide loader
    });
  });
</script>
</body>

</html>
