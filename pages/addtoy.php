<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries | Add Toy
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
  
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./dashboard.php" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <!-- End Navbar -->

  <!-- Tables for Borrowing History -->
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Submit Toy Data</h6>
                            </div>
                        </div>
                        <div class="card-body w-50">
                        <form id="toyForm" class="text-start">
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label"></label>
        <textarea placeholder="Description" id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Type:</label>
        <input type="text" id="type" name="type" class="form-control" required>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-control" required>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer" class="form-control" required>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Age Range:</label>
        <input type="number" id="ageRange" name="ageRange" class="form-control" required>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label"></label>
        <select id="isInStock" name="isInStock" class="form-control" required>
            <option value="">Select Availability Status</option>
            <option value="true">In Stock</option>
            <option value="false">Out of Stock</option>
        </select>
    </div>
    <div class="input-group input-group-outline mb-3">
        <label class="form-label">Release Date:</label>
        <input type="text" id="releaseDate" name="releaseDate" class="form-control" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn bg-gradient-info w-50 my-4 mb-2">Submit</button>
    </div>
</form>

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
  document.getElementById('toyForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    // Disable the submit button to prevent multiple submissions
    const submitButton = event.target.querySelector('button[type="submit"]');
    submitButton.disabled = true;

    // Get form data
    const toyData = {
        name: document.getElementById('name').value,
        description: document.getElementById('description').value,
        type: document.getElementById('type').value,
        price: document.getElementById('price').value,
        manufacturer: document.getElementById('manufacturer').value,
        ageRange: document.getElementById('ageRange').value,
        isInStock: document.getElementById('isInStock').value === 'true',
        releaseDate: document.getElementById('releaseDate').value
    };

    try {
        // Send toy data
        const response = await fetch('http://203.161.49.218:1337/api/toymetas/', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: toyData })
        });

        if (!response.ok) {
            throw new Error('Toy data submission failed');
        }

        // Success: Clear the form and provide feedback
        document.getElementById('toyForm').reset();
        alert('Toy submitted successfully!');

    } catch (error) {
        console.error('Error submitting the form:', error);
        alert('There was an error submitting the form.');
    } finally {
        // Re-enable the submit button
        submitButton.disabled = false;
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