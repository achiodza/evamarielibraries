<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries Dashboard
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
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .container-fluid {
        padding: 20px;
    }
    .card {
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: text-wrap;
    }
    th {
        background-color: #f4f4f4;
    }
    td.description {
        max-width: 300px; /* Adjust as necessary */
    }
    .table-responsive {
        overflow-x: auto;
    }
    input[type="text"] {
        width: 100%;
        box-sizing: border-box;
        padding: 5px;
    }
</style>
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
<?php include './includes/navheader.php'; ?>
   
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
                                <h6 class="text-white text-capitalize ps-3">Library Books Listing</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name & Author</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Genre</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Availability</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                        </tr>
                                        <!-- <tr>
                                            <th><input type="text" id="filter-title-author" placeholder="Filter by title or author"></th>
                                            <th><input type="text" id="filter-description" placeholder="Filter by description"></th>
                                            <th><input type="text" id="filter-genre" placeholder="Filter by genre"></th>
                                            <th><input type="text" id="filter-availability" placeholder="Filter by availability"></th>
                                            <th></th>
                                        </tr> -->
                                    </thead>
                                    <tbody id="book-table-body">
                                        <!-- Book information will be populated here -->
                                    </tbody>
                                </table>
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
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end"></ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('http://203.161.49.218:1337/api/books-metas/', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25'
            }
        })
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('book-table-body');
            data.data.forEach(book => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">${book.attributes.title}</h6>
                                <p class="text-xs text-secondary mb-0">${book.attributes.author}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs mb-0">${book.attributes.description}</p>
                    </td>
                    <td>
                        <p class="text-xs mb-0">${book.attributes.genre}</p>
                    </td>
                    <td>
                        <p class="text-xs mb-0">${book.attributes.availability}</p>
                    </td>
                    <td>
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit book">
                            Edit
                        </a>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            addFilterFunctionality();
        })
        .catch(error => console.error('Error:', error));
    });

    function addFilterFunctionality() {
        document.getElementById('filter-title-author').addEventListener('input', filterTable);
        document.getElementById('filter-description').addEventListener('input', filterTable);
        document.getElementById('filter-genre').addEventListener('input', filterTable);
        document.getElementById('filter-availability').addEventListener('input', filterTable);
    }

    function filterTable() {
        const titleAuthorFilter = document.getElementById('filter-title-author').value.toLowerCase();
        const descriptionFilter = document.getElementById('filter-description').value.toLowerCase();
        const genreFilter = document.getElementById('filter-genre').value.toLowerCase();
        const availabilityFilter = document.getElementById('filter-availability').value.toLowerCase();

        const rows = document.querySelectorAll('#book-table-body tr');
        rows.forEach(row => {
            const titleAuthor = row.cells[0].innerText.toLowerCase();
            const description = row.cells[1].innerText.toLowerCase();
            const genre = row.cells[2].innerText.toLowerCase();
            const availability = row.cells[3].innerText.toLowerCase();

            if (titleAuthor.includes(titleAuthorFilter) && description.includes(descriptionFilter) && genre.includes(genreFilter) && availability.includes(availabilityFilter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
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