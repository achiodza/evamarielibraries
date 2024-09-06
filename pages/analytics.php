<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries | Analytics
  </title>
  <!--     Fonts and icons     -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> <!-- SheetJS library -->
  <!-- Nepcha Analytics (nepcha.com) -->
 
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
  

  <!-- Tables for Borrowing History -->
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-10">
            <div class="row">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                <div class="row">
                <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Users Data</h6>
                </div>
               
                </div>
                
                </div>
                <div class="card-body p-3">
                <div class="row">
                <div class="col-md-6 mb-md-0 mb-4">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
                <h6 class="mb-0">List of Users In the Our Database</h6>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download</a>
                  </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
                <h6 class="mb-0">List of Borrowed Books Against Users</h6>
                <p style="color:red">Coming Soon</p>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-dark mb-0"><i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download</a>
                  </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
  const apiUrl = 'http://203.161.49.218:1337/api/users';  // Strapi API endpoint
  const authToken = 'Bearer d68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b';

  // Function to fetch users data from Strapi API
  async function fetchUsers() {
      try {
          const response = await fetch(apiUrl, {
              method: 'GET',
              headers: {
                  'Authorization': authToken
              }
          });
          const data = await response.json();
          return data;  // Return the user data
      } catch (error) {
          console.error('Error fetching users:', error);
      }
  }

  // Function to convert JSON data to Excel and trigger download
  function downloadExcel(users) {
      const formattedUsers = users.map(user => ({
          Username: user.username,
          Email: user.email,
          PhoneNumber: user.phoneNo || 'N/A',
          NextOfKin: user.nextOfKin || 'N/A',
          Location: user.location || 'N/A'
      }));

      const worksheet = XLSX.utils.json_to_sheet(formattedUsers);
      const workbook = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(workbook, worksheet, 'Users Data');

      // Exporting to Excel file
      XLSX.writeFile(workbook, 'Users_Data.xlsx');
  }

  // Add event listener to download button
  document.getElementById('download-excel').addEventListener('click', async () => {
      const users = await fetchUsers();  // Fetch users data from the API
      if (users && users.length > 0) {
          downloadExcel(users);  // Trigger download of Excel file
      } else {
          alert('No data to download.');
      }
  });
</script>

  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
</body>

</html>