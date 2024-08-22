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
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Library Dashboard</span>
          </a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Borrowing History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white bg-gradient-info active" href="../pages/librarybooks.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1">Library Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/librarytoys.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">car</i>
            </div>
            <span class="nav-link-text ms-1">Childrens Toys</span>
          </a>
        </li>
      
    
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">User Management</span>
          </a>
        </li>
     -->
        <li class="nav-item">
          <a class="nav-link text-white" href="../register.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Manage Users</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard </a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Harare | Eva Marie Libraries</li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><b style="color: blue;">Eva Marie </b>Libraries</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              
              <div class="clock" id="clock" style="color: blue;"></div>
            </div>
          </div>
          <script>
            function updateClock() {
              const now = new Date();
              const hours = now.getHours().toString().padStart(2, '0');
              const minutes = now.getMinutes().toString().padStart(2, '0');
              const seconds = now.getSeconds().toString().padStart(2, '0');
              const timeString = `${hours}:${minutes}:${seconds}`;
              
              document.getElementById('clock').textContent = timeString;
            }
            
            // Update the clock every second
            setInterval(updateClock, 1000);
            
            // Initial call to display the clock immediately
            updateClock();
            </script>
          <ul class="navbar-nav  justify-content-end">
          
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              
            </li>
            <li class="nav-item d-flex align-items-center">
              <button class="btn bg-gradient-dark mb-0" onclick="window.location.href='addbook.php'">Add Book</button>
          </li>
          <li class="nav-item d-flex align-items-center">
            <button style="margin-left: 10px;" class="btn bg-gradient-dark mb-0" onclick="window.location.href='addtoy.php'">Add Toy(s)</button>

        </li>          </ul>
        </div>
      </div>
    </nav>
   
    <!-- End Navbar -->

    <!-- Script to Fetch Data -->
    <script>
      // Function to fetch the JSON data
      function fetchTransactionData() {
          // Fetch the JSON file
          fetch('history_transactions.json')
              .then(response => response.json())
              .then(data => {
                  // Get the last record from the data array
                  const lastRecord = data[data.length - 1];
  
                  // Display the cardid in the HTML block
                  document.getElementById('transaction-cardid').textContent = lastRecord.getuid;
                  
                  // Display the date time in the HTML block
                  document.getElementById('transaction-time').textContent = lastRecord.date;
  
                  // Display the amount in the HTML block
                  document.getElementById('transaction-amount').textContent = lastRecord.amount;
              })
              .catch(error => console.error('Error fetching transaction data:', error));
      }
  
      // Call the function to fetch and display transaction data
      fetchTransactionData();
  </script>
  


    <script>
      // Fetch the JSON data
      fetch('history_transactions.json')
          .then(response => response.json())
          .then(data => {
              const tableBody = document.getElementById('transaction-table-body');

              // Iterate through each transaction in the data
              data.forEach((transaction, index) => {
                  // Create a table row
                  const row = document.createElement('tr');

                  // Create table data cells and populate them with transaction information
                  const transactionIDCell = document.createElement('td');
                  transactionIDCell.textContent = transaction.getuid;// Assuming transaction ID is the index + 1
                  row.appendChild(transactionIDCell);

                  const dateCell = document.createElement('td');
                  dateCell.textContent = transaction.date;
                  row.appendChild(dateCell);

                  const amountCell = document.createElement('td');
                  amountCell.textContent = transaction.amount !== null ? '$' + transaction.amount.toFixed(2) : 'N/A';
                  row.appendChild(amountCell);

                  // Append the row to the table body
                  tableBody.appendChild(row);
              });
          })
          .catch(error => console.error('Error fetching transaction data:', error));
  </script>

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
                'Authorization': 'Bearer 54afcf2adc076c68aec973bb9af9f40e2a636e8cb4dea8d1587ee653a13e3dff7c0a80dc640a506f951eab03413f161d8f9fea6cb0122bb3974fa5eb6536be36060f73e05405266e4bfaf10f20943b272ae0a723de57f1b6894b71eba26a1d45e32ca15e085cb28fa9967d3782ac006469a6aca7434bba33c8933a004070cab2'
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
                        <p class="text-xs mb-0">${book.attributes.discription}</p>
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